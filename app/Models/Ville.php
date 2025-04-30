<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;
    
    /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'pays_id',
    ];
    
    /**
     * Relation avec le modèle Pays (si vous l'implémentez plus tard).
     */
    public function pays()
    {
        return $this->belongsTo(Pays::class);
    }
}
