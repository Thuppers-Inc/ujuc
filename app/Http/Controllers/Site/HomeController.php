<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Formation;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Affiche la page d'accueil du site.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        // Récupère toutes les catégories avec leurs formations et le compteur
        $categories = Categorie::withCount('formations')->with('formations')->get();
        
        // Récupère les formations mises en avant (on pourrait ajouter un champ "mise_en_avant" plus tard)
        $formationsEnVedette = Formation::latest()->take(3)->get();
        
        return view('site.home', compact('categories', 'formationsEnVedette'));
    }
} 