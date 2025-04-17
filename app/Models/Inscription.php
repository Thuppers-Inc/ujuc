<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inscription extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenoms',
        'numero_cni',
        'ville_commune',
        'contact',
        'email',
        'niveau_etude',
        'formation_id',
        'statut',
    ];

    /**
     * Les valeurs possibles pour le statut d'une inscription.
     * 
     * @var array
     */
    public const STATUTS = [
        'en_attente' => 'En attente',
        'confirmé' => 'Confirmé',
        'annulé' => 'Annulé'
    ];

    /**
     * Obtient la formation à laquelle cette inscription est associée.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function formation(): BelongsTo
    {
        return $this->belongsTo(Formation::class, 'formation_id');
    }

    /**
     * Vérifie si l'inscription est en attente.
     *
     * @return bool
     */
    public function estEnAttente(): bool
    {
        return $this->statut === 'en_attente';
    }

    /**
     * Vérifie si l'inscription est confirmée.
     *
     * @return bool
     */
    public function estConfirmee(): bool
    {
        return $this->statut === 'confirmé';
    }

    /**
     * Vérifie si l'inscription est annulée.
     *
     * @return bool
     */
    public function estAnnulee(): bool
    {
        return $this->statut === 'annulé';
    }

    /**
     * Obtient le nom complet de l'inscrit.
     *
     * @return string
     */
    public function getNomComplet(): string
    {
        return $this->nom . ' ' . $this->prenoms;
    }
} 