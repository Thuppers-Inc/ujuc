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
} 