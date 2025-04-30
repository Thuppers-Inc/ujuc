<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Mail\InscriptionConfirmee;
use App\Models\Formation;
use App\Models\Inscription;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class InscriptionController extends Controller
{
    /**
     * Enregistre une nouvelle inscription à une formation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Formation $formation): RedirectResponse
    {
        // Validation des données
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenoms' => 'required|string|max:255',
            'numero_cni' => 'nullable|string|max:255',
            'ville_id' => 'required|exists:villes,id',
            'contact' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'niveau_etude' => 'nullable|string|max:255',
        ]);

        // Ajout de l'ID de la formation
        $validatedData['formation_id'] = $formation->id;
        
        // Crée l'inscription
        $inscription = Inscription::create($validatedData);
        
        // Charge les relations nécessaires pour l'e-mail
        $inscription->load(['formation', 'ville']);
        
        // Envoi de l'e-mail de confirmation si l'adresse e-mail est fournie
        if ($inscription->email) {
            Mail::to($inscription->email)
                ->send(new InscriptionConfirmee($inscription));
        }
        
        // Redirige vers la page de confirmation
        return redirect()->route('inscription.confirmation', $inscription);
    }
    
    /**
     * Affiche la page de confirmation après une inscription réussie.
     *
     * @param  \App\Models\Inscription  $inscription
     * @return \Illuminate\View\View
     */
    public function confirmation(Inscription $inscription): View
    {
        // Charge la formation associée et la ville
        $inscription->load(['formation', 'ville']);
        
        return view('site.inscriptions.confirmation', compact('inscription'));
    }
} 