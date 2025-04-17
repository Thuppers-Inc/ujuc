<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;

class CategorieController extends Controller
{
    /**
     * Affiche la liste des catégories.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $categories = Categorie::withCount('formations')->get();
        
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Affiche le formulaire de création d'une catégorie.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('admin.categories.create');
    }

    /**
     * Enregistre une nouvelle catégorie.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255|unique:categories',
            'description' => 'nullable|string',
        ]);
        
        // Génère le slug à partir du nom
        $validatedData['slug'] = Str::slug($validatedData['nom']);
        
        Categorie::create($validatedData);
        
        return redirect()->route('admin.categories.index')
            ->with('success', 'Catégorie créée avec succès.');
    }

    /**
     * Affiche le formulaire d'édition d'une catégorie.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\View\View
     */
    public function edit(Categorie $categorie): View
    {
        return view('admin.categories.edit', compact('categorie'));
    }

    /**
     * Met à jour une catégorie.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Categorie $categorie): RedirectResponse
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255|unique:categories,nom,' . $categorie->id,
            'description' => 'nullable|string',
        ]);
        
        // Génère le slug à partir du nom si le nom a changé
        if ($categorie->nom !== $validatedData['nom']) {
            $validatedData['slug'] = Str::slug($validatedData['nom']);
        }
        
        $categorie->update($validatedData);
        
        return redirect()->route('admin.categories.index')
            ->with('success', 'Catégorie mise à jour avec succès.');
    }

    /**
     * Supprime une catégorie.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Categorie $categorie): RedirectResponse
    {
        // Vérifie si la catégorie a des formations
        if ($categorie->formations()->count() > 0) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Impossible de supprimer cette catégorie car elle contient des formations.');
        }
        
        $categorie->delete();
        
        return redirect()->route('admin.categories.index')
            ->with('success', 'Catégorie supprimée avec succès.');
    }
} 