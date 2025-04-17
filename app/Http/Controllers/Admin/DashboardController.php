<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Formation;
use App\Models\Inscription;
use App\Models\Categorie;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Affiche la page d'accueil du dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        // Nombre total d'inscriptions
        $totalInscriptions = Inscription::count();
        
        // Nombre d'inscriptions en attente
        $inscriptionsEnAttente = Inscription::where('statut', 'en_attente')->count();
        
        // Nombre d'inscriptions confirmées
        $inscriptionsConfirmees = Inscription::where('statut', 'confirmé')->count();
        
        // Inscriptions récentes
        $inscriptionsRecentes = Inscription::with('formation')
            ->latest()
            ->take(5)
            ->get();
        
        // Nombre total de formations
        $totalFormations = Formation::count();
        
        return view('admin.dashboard', compact(
            'totalInscriptions',
            'inscriptionsEnAttente',
            'inscriptionsConfirmees',
            'inscriptionsRecentes',
            'totalFormations'
        ));
    }
    
    /**
     * Affiche les statistiques du dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function statistiques(): View
    {
        // Statistiques par catégorie
        $inscriptionsParCategorie = Formation::with('categorie')
            ->withCount('inscriptions')
            ->get()
            ->groupBy('categorie.nom')
            ->map(function ($item) {
                return $item->sum('inscriptions_count');
            });
        
        // Statistiques par mois
        $inscriptionsParMois = Inscription::selectRaw('MONTH(created_at) as mois, COUNT(*) as total')
            ->whereYear('created_at', date('Y'))
            ->groupBy('mois')
            ->orderBy('mois')
            ->get()
            ->pluck('total', 'mois')
            ->toArray();
        
        // Formatage des mois pour l'affichage
        $moisFrancais = [
            1 => 'Janvier', 2 => 'Février', 3 => 'Mars', 4 => 'Avril',
            5 => 'Mai', 6 => 'Juin', 7 => 'Juillet', 8 => 'Août',
            9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre'
        ];
        
        $inscriptionsParMoisFormate = [];
        foreach ($moisFrancais as $numero => $nom) {
            $inscriptionsParMoisFormate[$nom] = $inscriptionsParMois[$numero] ?? 0;
        }
        
        // Récupérer les formations les plus populaires
        $formationsPopulaires = Formation::withCount([
                'inscriptions as total_inscriptions',
                'inscriptions as inscriptions_en_attente' => function ($query) {
                    $query->where('statut', 'en_attente');
                },
                'inscriptions as inscriptions_confirmees' => function ($query) {
                    $query->where('statut', 'confirmé');
                }
            ])
            ->with('categorie')
            ->orderByDesc('total_inscriptions')
            ->take(5)
            ->get()
            ->map(function ($formation) {
                // Calculer le taux de conversion
                $tauxConversion = $formation->total_inscriptions > 0 
                    ? round(($formation->inscriptions_confirmees / $formation->total_inscriptions) * 100) 
                    : 0;
                    
                return [
                    'id' => $formation->id,
                    'titre' => $formation->titre,
                    'categorie' => $formation->categorie->nom,
                    'total' => $formation->total_inscriptions,
                    'en_attente' => $formation->inscriptions_en_attente,
                    'confirmees' => $formation->inscriptions_confirmees,
                    'taux_conversion' => $tauxConversion
                ];
            });
            
        // Statistiques globales
        $statsGlobales = [
            'total_inscriptions' => Inscription::count(),
            'inscriptions_en_attente' => Inscription::where('statut', 'en_attente')->count(),
            'inscriptions_confirmees' => Inscription::where('statut', 'confirmé')->count(),
            'taux_conversion_global' => Inscription::count() > 0 
                ? round((Inscription::where('statut', 'confirmé')->count() / Inscription::count()) * 100)
                : 0
        ];
        
        return view('admin.statistiques', compact(
            'inscriptionsParCategorie', 
            'inscriptionsParMoisFormate',
            'formationsPopulaires',
            'statsGlobales'
        ));
    }
} 