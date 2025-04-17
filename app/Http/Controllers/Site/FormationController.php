<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Formation;
use Illuminate\View\View;

class FormationController extends Controller
{
    /**
     * Affiche la liste de toutes les formations.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $formations = Formation::with('categorie')->latest()->paginate(9);
        $categories = Categorie::all();
        
        return view('site.formations.index', compact('formations', 'categories'));
    }
    
    /**
     * Affiche les formations d'une catégorie spécifique.
     *
     * @param \App\Models\Categorie $categorie
     * @return \Illuminate\View\View
     */
    public function parCategorie(Categorie $categorie): View
    {
        $formations = $categorie->formations()->paginate(9);
        $categories = Categorie::all();
        
        return view('site.formations.categorie', compact('formations', 'categories', 'categorie'));
    }
    
    /**
     * Affiche les détails d'une formation spécifique.
     *
     * @param \App\Models\Formation $formation
     * @return \Illuminate\View\View
     */
    public function show(Formation $formation): View
    {
        // Charge la catégorie et les autres formations similaires
        $formation->load('categorie');
        $formationsSimilaires = Formation::where('categorie_id', $formation->categorie_id)
            ->where('id', '!=', $formation->id)
            ->take(3)
            ->get();
        
        return view('site.formations.show', compact('formation', 'formationsSimilaires'));
    }
} 