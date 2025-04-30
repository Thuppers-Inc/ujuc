<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Categorie extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'slug',
        'description',
    ];

    /**
     * La méthode boot du modèle.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        // Génère automatiquement un slug à partir du nom lors de la création
        static::creating(function ($categorie) {
            if (!$categorie->slug) {
                $categorie->slug = Str::slug($categorie->nom);
            }
        });
    }

    /**
     * Obtient les formations associées à cette catégorie.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function formations(): HasMany
    {
        return $this->hasMany(Formation::class, 'categorie_id');
    }
    
    /**
     * Obtient l'icône FontAwesome appropriée pour cette catégorie.
     *
     * @return string
     */
    public function getIconClass(): string
    {
        $nom = Str::lower($this->nom);
        
        // Correspondances spécifiques pour les catégories du CategorieSeeder
        $categoriesSpecifiques = [
            'agriculture/elevage' => 'fa-tractor',
            'tech-numerique' => 'fa-laptop-code',
            'métiers manuels' => 'fa-tools',
            'e-commerce' => 'fa-shopping-cart',
            'logistique/transport' => 'fa-truck',
            'technologie' => 'fa-microchip',
            'batiment travaux publics' => 'fa-hard-hat',
            'finance compta' => 'fa-money-bill-wave',
        ];
        
        // Vérifier d'abord si c'est une correspondance exacte avec une catégorie du seed
        foreach ($categoriesSpecifiques as $categorieCle => $icone) {
            if (Str::lower($this->nom) === $categorieCle) {
                return $icone;
            }
        }
        
        // Correspondance entre mots-clés dans le nom de la catégorie et icônes
        $iconesMappees = [
            // Catégorie AGRICULTURE/ELEVAGE
            'agriculture' => 'fa-leaf',
            'elevage' => 'fa-horse',
            'agronomie' => 'fa-seedling',
            'ferme' => 'fa-tractor',
            
            // Catégorie TECH-NUMERIQUE
            'tech' => 'fa-laptop-code',
            'numerique' => 'fa-desktop',
            'développement' => 'fa-code',
            'dev' => 'fa-code',
            'programmation' => 'fa-code',
            'web' => 'fa-globe',
            'informatique' => 'fa-laptop',
            
            // Catégorie MÉTIERS MANUELS
            'métiers manuels' => 'fa-tools',
            'artisanat' => 'fa-hands',
            'menuiserie' => 'fa-hammer',
            'couture' => 'fa-cut',
            
            // Catégorie E-COMMERCE
            'commerce' => 'fa-store',
            'e-commerce' => 'fa-shopping-cart',
            'vente' => 'fa-tags',
            'boutique' => 'fa-shopping-bag',
            
            // Catégorie LOGISTIQUE/TRANSPORT
            'logistique' => 'fa-truck',
            'transport' => 'fa-shipping-fast',
            'supply chain' => 'fa-boxes',
            'entrepôt' => 'fa-warehouse',
            
            // Catégorie TECHNOLOGIE
            'technologie' => 'fa-microchip',
            'innovation' => 'fa-rocket',
            'robotique' => 'fa-robot',
            'électronique' => 'fa-microchip',
            
            // Catégorie BATIMENT TRAVAUX PUBLICS
            'batiment' => 'fa-hard-hat',
            'travaux' => 'fa-hammer',
            'construction' => 'fa-building',
            'génie civil' => 'fa-drafting-compass',
            
            // Catégorie FINANCE COMPTA
            'finance' => 'fa-money-bill-wave',
            'compta' => 'fa-calculator',
            'comptabilité' => 'fa-calculator',
            'gestion' => 'fa-chart-line',
            
            // Autres correspondances générales
            'design' => 'fa-paint-brush',
            'graphisme' => 'fa-palette',
            'marketing' => 'fa-bullhorn',
            'digital' => 'fa-digital-tachograph',
            'business' => 'fa-briefcase',
            'entreprise' => 'fa-building',
            'communication' => 'fa-comments',
            'langues' => 'fa-language',
            'santé' => 'fa-heartbeat',
            'médical' => 'fa-medkit',
            'cuisine' => 'fa-utensils',
            'éducation' => 'fa-graduation-cap',
            'enseignement' => 'fa-chalkboard-teacher',
            'formation' => 'fa-user-graduate',
            'mécanique' => 'fa-wrench',
            'automobile' => 'fa-car',
            'électricité' => 'fa-bolt',
            'plomberie' => 'fa-faucet',
            'beauté' => 'fa-spa',
            'coiffure' => 'fa-cut',
            'esthétique' => 'fa-female',
            'tourisme' => 'fa-plane',
            'hôtellerie' => 'fa-hotel',
            'restauration' => 'fa-utensils',
            'bureautique' => 'fa-file-word',
            'office' => 'fa-file-excel',
            'mode' => 'fa-tshirt',
            'textile' => 'fa-tshirt',
            'boulangerie' => 'fa-bread-slice',
            'pâtisserie' => 'fa-birthday-cake',
        ];
        
        // Vérifier si un des mots-clés connus est présent dans le nom de la catégorie
        foreach ($iconesMappees as $motCle => $icone) {
            if (Str::contains($nom, $motCle)) {
                return $icone;
            }
        }
        
        // Icône par défaut si aucune correspondance n'est trouvée
        return 'fa-book-open';
    }
} 