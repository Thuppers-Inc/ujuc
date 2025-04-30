<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
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
        'logo',
        'description',
        'site_web',
        'est_actif',
        'ordre',
    ];

    /**
     * Les attributs qui doivent être convertis en types natifs.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'est_actif' => 'boolean',
        'ordre' => 'integer',
    ];

    /**
     * Définir le scope pour récupérer uniquement les partenaires actifs.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActifs($query)
    {
        return $query->where('est_actif', true)->orderBy('ordre');
    }

    /**
     * Obtient l'URL du logo du partenaire.
     *
     * @return string
     */
    public function getLogoUrl()
    {
        if ($this->logo) {
            return asset('storage/partners/' . $this->logo);
        }
        
        // On vérifie si l'image existe dans le dossier public/img/partners
        $publicPath = 'img/partners/' . $this->slug . '.png';
        if (file_exists(public_path($publicPath))) {
            return asset($publicPath);
        }
        
        // Image par défaut
        return asset('img/default-partner.png');
    }
} 