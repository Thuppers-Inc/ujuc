<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PartenaireController extends Controller
{
    /**
     * Affiche la liste des partenaires
     */
    public function index()
    {
        $partenaires = Partenaire::orderBy('ordre')->paginate(10);
        return view('admin.partenaires.index', compact('partenaires'));
    }

    /**
     * Affiche le formulaire de création d'un partenaire
     */
    public function create()
    {
        return view('admin.partenaires.create');
    }

    /**
     * Enregistre un nouveau partenaire
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'site_web' => 'required|url|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ordre' => 'nullable|integer|min:0',
            'est_actif' => 'nullable|boolean',
        ]);

        // Créer le slug à partir du nom
        $validated['slug'] = Str::slug($validated['nom']);

        // Gestion de l'ordre si non renseigné
        if (!isset($validated['ordre'])) {
            $validated['ordre'] = Partenaire::max('ordre') + 1;
        }

        // Conversion de la case à cocher
        $validated['est_actif'] = isset($validated['est_actif']) ? true : false;

        // Gestion du logo
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $filename = $validated['slug'] . '-' . time() . '.' . $logo->getClientOriginalExtension();
            $path = $logo->storeAs('partners', $filename, 'public');
            $validated['logo'] = $filename;
        }

        Partenaire::create($validated);

        return redirect()->route('admin.partenaires.index')
            ->with('success', 'Le partenaire a été créé avec succès');
    }

    /**
     * Affiche le formulaire d'édition d'un partenaire
     */
    public function edit(Partenaire $partenaire)
    {
        return view('admin.partenaires.edit', compact('partenaire'));
    }

    /**
     * Met à jour un partenaire existant
     */
    public function update(Request $request, Partenaire $partenaire)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'site_web' => 'required|url|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ordre' => 'nullable|integer|min:0',
            'est_actif' => 'nullable|boolean',
            'supprimer_logo' => 'nullable|boolean',
        ]);

        // Mise à jour du slug uniquement si le nom a changé
        if ($partenaire->nom !== $validated['nom']) {
            $validated['slug'] = Str::slug($validated['nom']);
        }

        // Conversion de la case à cocher
        $validated['est_actif'] = isset($validated['est_actif']) ? true : false;

        // Gestion du logo
        if ($request->hasFile('logo')) {
            // Supprimer l'ancien logo s'il existe
            if ($partenaire->logo && Storage::disk('public')->exists('partners/' . $partenaire->logo)) {
                Storage::disk('public')->delete('partners/' . $partenaire->logo);
            }

            // Télécharger le nouveau logo
            $logo = $request->file('logo');
            $filename = $validated['slug'] . '-' . time() . '.' . $logo->getClientOriginalExtension();
            $path = $logo->storeAs('partners', $filename, 'public');
            $validated['logo'] = $filename;
        } 
        // Si l'option "supprimer le logo" est cochée
        elseif (isset($validated['supprimer_logo']) && $validated['supprimer_logo']) {
            // Supprimer le logo s'il existe
            if ($partenaire->logo && Storage::disk('public')->exists('partners/' . $partenaire->logo)) {
                Storage::disk('public')->delete('partners/' . $partenaire->logo);
            }
            $validated['logo'] = null;
        }

        // Supprimer les champs non nécessaires pour la mise à jour
        unset($validated['supprimer_logo']);

        $partenaire->update($validated);

        return redirect()->route('admin.partenaires.index')
            ->with('success', 'Le partenaire a été mis à jour avec succès');
    }

    /**
     * Supprime un partenaire
     */
    public function destroy(Partenaire $partenaire)
    {
        // Supprimer le logo s'il existe
        if ($partenaire->logo && Storage::disk('public')->exists('partners/' . $partenaire->logo)) {
            Storage::disk('public')->delete('partners/' . $partenaire->logo);
        }

        $partenaire->delete();

        return redirect()->route('admin.partenaires.index')
            ->with('success', 'Le partenaire a été supprimé avec succès');
    }
} 