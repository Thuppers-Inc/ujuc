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
} 