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
        'ville_id',
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
     * Obtient la ville associée à cette inscription.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ville(): BelongsTo
    {
        return $this->belongsTo(Ville::class, 'ville_id');
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

    /**
     * Obtient le numéro d'inscription formaté.
     *
     * @return string
     */
    public function getNumeroInscription(): string
    {
        $annee = date('Y');
        $formation_code = substr(strtoupper(preg_replace('/[^a-zA-Z0-9]/', '', $this->formation->titre)), 0, 3);
        return sprintf('INS-%s-%s-%06d', $annee, $formation_code, $this->id);
    }
} 