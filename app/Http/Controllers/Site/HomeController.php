<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Formation;
use App\Models\Partenaire;
use Illuminate\Http\Request;
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
        // Récupérer les catégories avec le nombre de formations
        $categories = Categorie::withCount('formations')->get();
        
        // Récupérer quelques formations en vedette
        $formationsEnVedette = Formation::with('categorie')
                                       ->inRandomOrder()
                                       ->take(3)
                                       ->get();
        
        // Récupérer les partenaires actifs, triés par ordre
        $partenaires = Partenaire::actifs()->get();
        
        return view('site.home', compact('categories', 'formationsEnVedette', 'partenaires'));
    }
} 