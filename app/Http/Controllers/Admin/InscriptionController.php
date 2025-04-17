<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inscription;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class InscriptionController extends Controller
{
    /**
     * Affiche la liste des inscriptions.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        $inscriptions = Inscription::with('formation')
            ->orderByDesc('created_at')
            ->paginate(15);

        return view('admin.inscriptions.index', compact('inscriptions'));
    }

    /**
     * Affiche les détails d'une inscription.
     *
     * @param  \App\Models\Inscription  $inscription
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Inscription $inscription): View
    {
        $inscription->load('formation.categorie');
        
        // Récupération des formations similaires (même catégorie)
        $formationsSimilaires = Formation::where('categorie_id', $inscription->formation->categorie_id)
            ->where('id', '!=', $inscription->formation_id)
            ->take(3)
            ->get();
        
        return view('admin.inscriptions.show', compact('inscription', 'formationsSimilaires'));
    }

    /**
     * Affiche le formulaire d'édition d'une inscription.
     *
     * @param  \App\Models\Inscription  $inscription
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Inscription $inscription): View
    {
        $inscription->load('formation');
        $formations = Formation::orderBy('titre')->get();
        
        return view('admin.inscriptions.edit', compact('inscription', 'formations'));
    }

    /**
     * Met à jour l'inscription dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inscription  $inscription
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Inscription $inscription): RedirectResponse
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenoms' => 'required|string|max:255',
            'numero_cni' => 'required|string|max:50',
            'ville_commune' => 'required|string|max:255',
            'contact' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'niveau_etude' => 'required|string|max:255',
            'formation_id' => 'required|exists:formations,id',
            'statut' => 'required|in:' . implode(',', array_keys(Inscription::STATUTS)),
        ]);

        $inscription->update($validated);

        return redirect()->route('admin.inscriptions.show', $inscription)
            ->with('success', 'Inscription mise à jour avec succès');
    }

    /**
     * Supprime l'inscription de la base de données.
     *
     * @param  \App\Models\Inscription  $inscription
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Inscription $inscription): RedirectResponse
    {
        $inscription->delete();

        return redirect()->route('admin.inscriptions.index')
            ->with('success', 'Inscription supprimée avec succès');
    }

    /**
     * Met à jour uniquement le statut d'une inscription.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inscription  $inscription
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatut(Request $request, Inscription $inscription): RedirectResponse
    {
        // Déterminer le statut en fonction de la route appelée
        $routeName = $request->route()->getName();
        
        if ($routeName === 'admin.inscriptions.confirmer') {
            $statut = 'confirmé';
            $message = 'Inscription confirmée avec succès';
        } elseif ($routeName === 'admin.inscriptions.annuler') {
            $statut = 'annulé';
            $message = 'Inscription annulée avec succès';
        } else {
            // Pour la route admin.inscriptions.update-statut
            $validated = $request->validate([
                'statut' => 'required|in:' . implode(',', array_keys(Inscription::STATUTS)),
            ]);
            $statut = $validated['statut'];
            $message = 'Statut de l\'inscription mis à jour avec succès';
        }

        $inscription->update(['statut' => $statut]);

        return redirect()->route('admin.inscriptions.show', $inscription)
            ->with('success', $message);
    }
} 