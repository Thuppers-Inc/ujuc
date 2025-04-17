<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Formation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class FormationController extends Controller
{
    /**
     * Affiche la liste des formations.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $formations = Formation::with('categorie')->latest()->get();
        
        return view('admin.formations.index', compact('formations'));
    }

    /**
     * Affiche le formulaire de création d'une formation.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        $categories = Categorie::all();
        
        return view('admin.formations.create', compact('categories'));
    }

    /**
     * Enregistre une nouvelle formation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'contenu' => 'required|string',
            'duree_jours' => 'required|integer|min:1',
            'prix' => 'required|numeric|min:0',
            'categorie_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        // Génère le slug à partir du titre
        $validatedData['slug'] = Str::slug($validatedData['titre']);
        
        // Gestion de l'image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/formations', $imageName);
            $validatedData['image'] = $imageName;
        }
        
        Formation::create($validatedData);
        
        return redirect()->route('admin.formations.index')
            ->with('success', 'Formation créée avec succès.');
    }

    /**
     * Affiche les détails d'une formation.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\View\View
     */
    public function show(Formation $formation): View
    {
        $formation->load('categorie');
        $inscriptions = $formation->inscriptions()->latest()->take(5)->get();
        
        return view('admin.formations.show', compact('formation', 'inscriptions'));
    }

    /**
     * Affiche le formulaire d'édition d'une formation.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\View\View
     */
    public function edit(Formation $formation): View
    {
        $categories = Categorie::all();
        
        return view('admin.formations.edit', compact('formation', 'categories'));
    }

    /**
     * Met à jour une formation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Formation $formation): RedirectResponse
    {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'contenu' => 'required|string',
            'duree_jours' => 'required|integer|min:1',
            'prix' => 'required|numeric|min:0',
            'categorie_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        // Génère le slug à partir du titre si le titre a changé
        if ($formation->titre !== $validatedData['titre']) {
            $validatedData['slug'] = Str::slug($validatedData['titre']);
        }
        
        // Gestion de l'image
        if ($request->hasFile('image')) {
            // Supprime l'ancienne image si elle existe
            if ($formation->image) {
                Storage::delete('public/formations/' . $formation->image);
            }
            
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/formations', $imageName);
            $validatedData['image'] = $imageName;
        }
        
        $formation->update($validatedData);
        
        return redirect()->route('admin.formations.index')
            ->with('success', 'Formation mise à jour avec succès.');
    }

    /**
     * Supprime une formation.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Formation $formation): RedirectResponse
    {
        // Vérifie si la formation a des inscriptions
        if ($formation->inscriptions()->count() > 0) {
            return redirect()->route('admin.formations.index')
                ->with('error', 'Impossible de supprimer cette formation car elle contient des inscriptions.');
        }
        
        // Supprime l'image associée si elle existe
        if ($formation->image) {
            Storage::delete('public/formations/' . $formation->image);
        }
        
        $formation->delete();
        
        return redirect()->route('admin.formations.index')
            ->with('success', 'Formation supprimée avec succès.');
    }

    /**
     * Affiche la liste des formations avec le nouveau template.
     *
     * @return \Illuminate\View\View
     */
    public function indexTemplate(): View
    {
        $formations = Formation::with('categorie')->latest()->get();
        
        return view('admin.formations.index_template', compact('formations'));
    }

    /**
     * Affiche le formulaire de création d'une formation avec le nouveau template.
     *
     * @return \Illuminate\View\View
     */
    public function createTemplate(): View
    {
        $categories = Categorie::all();
        
        return view('admin.formations.create_template', compact('categories'));
    }

    /**
     * Supprime l'image d'une formation.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyImage(Formation $formation): RedirectResponse
    {
        if ($formation->image) {
            Storage::delete('public/formations/' . $formation->image);
            $formation->update(['image' => null]);
            
            return redirect()->back()->with('success', 'Image supprimée avec succès.');
        }
        
        return redirect()->back()->with('error', 'Aucune image à supprimer.');
    }
} 