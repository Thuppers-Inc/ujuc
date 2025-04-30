<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Formation extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'titre',
        'slug',
        'description',
        'categorie_id',
        'contenu',
        'image',
        'duree_jours',
        'prix',
        'format',
        'niveau_requis',
    ];

    /**
     * La méthode boot du modèle.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        // Génère automatiquement un slug à partir du titre lors de la création
        static::creating(function ($formation) {
            if (!$formation->slug) {
                $formation->slug = Str::slug($formation->titre);
            }
        });
    }

    /**
     * Obtient la catégorie à laquelle appartient cette formation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    /**
     * Obtient les inscriptions associées à cette formation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscriptions(): HasMany
    {
        return $this->hasMany(Inscription::class, 'formation_id');
    }

    /**
     * Vérifie si la formation a une image.
     *
     * @return bool
     */
    public function hasImage(): bool
    {
        return !empty($this->image);
    }

    /**
     * Obtient l'URL de l'image de la formation.
     *
     * @return string
     */
    public function getImageUrl(): string
    {
        if ($this->hasImage()) {
            return asset('storage/formations/' . $this->image);
        }
        
        // Image par défaut si aucune image n'est définie
        return asset('img/default-formation.jpg');
    }
    
    /**
     * Obtient le nombre total de places disponibles pour cette formation.
     * 
     * @return int
     */
    public function getPlacesDisponibles(): int
    {
        // Si la propriété places_disponibles n'existe pas, on retourne une valeur par défaut
        return $this->places_disponibles ?? 20;
    }
    
    /**
     * Obtient le nombre d'inscriptions confirmées pour cette formation.
     * 
     * @return int
     */
    public function getInscriptionsConfirmees(): int
    {
        return $this->inscriptions()->where('statut', 'confirmé')->count();
    }
    
    /**
     * Calcule le pourcentage d'occupation des places de la formation.
     * 
     * @return int
     */
    public function getTauxOccupation(): int
    {
        $placesDisponibles = $this->getPlacesDisponibles();
        
        if ($placesDisponibles <= 0) {
            return 100;
        }
        
        $inscriptionsConfirmees = $this->getInscriptionsConfirmees();
        return min(100, round(($inscriptionsConfirmees / $placesDisponibles) * 100));
    }
    
    /**
     * Détermine si la formation est complète.
     * 
     * @return bool
     */
    public function isComplet(): bool
    {
        return $this->getInscriptionsConfirmees() >= $this->getPlacesDisponibles();
    }
    
    /**
     * Détermine si la formation est presque complète (>= 80% des places occupées).
     * 
     * @return bool
     */
    public function isPresqueComplet(): bool
    {
        return $this->getTauxOccupation() >= 80;
    }
    
    /**
     * Obtient l'icône correspondant au format de la formation.
     * 
     * @return string
     */
    public function getFormatIcon(): string
    {
        $icons = [
            'présentiel' => 'fa-building',
            'distanciel' => 'fa-laptop-house',
            'hybride' => 'fa-people-arrows'
        ];
        
        return $icons[$this->format] ?? 'fa-chalkboard-teacher';
    }
    
    /**
     * Obtient la couleur de fond correspondant au format de la formation.
     * 
     * @return string
     */
    public function getFormatBgColor(): string
    {
        $colors = [
            'présentiel' => 'bg-blue-100 text-blue-800',
            'distanciel' => 'bg-purple-100 text-purple-800',
            'hybride' => 'bg-teal-100 text-teal-800'
        ];
        
        return $colors[$this->format] ?? 'bg-gray-100 text-gray-800';
    }
    
    /**
     * Obtient l'icône correspondant au niveau requis pour la formation.
     * 
     * @return string
     */
    public function getNiveauIcon(): string
    {
        $icons = [
            'débutant' => 'fa-seedling',
            'intermédiaire' => 'fa-user-graduate',
            'avancé' => 'fa-star'
        ];
        
        return $icons[$this->niveau_requis] ?? 'fa-star-half-alt';
    }
    
    /**
     * Obtient la couleur de fond correspondant au niveau requis pour la formation.
     * 
     * @return string
     */
    public function getNiveauBgColor(): string
    {
        $colors = [
            'débutant' => 'bg-green-100 text-green-800',
            'intermédiaire' => 'bg-yellow-100 text-yellow-800',
            'avancé' => 'bg-red-100 text-red-800'
        ];
        
        return $colors[$this->niveau_requis] ?? 'bg-gray-100 text-gray-800';
    }
} 