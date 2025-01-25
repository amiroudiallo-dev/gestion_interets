<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Domain;
use App\Models\Observation;

class Analyse extends Model
{
    use HasFactory;

    /**
     * Table associée au modèle.
     */
    protected $table = 'analyses';

    /**
     * Attributs assignables en masse.
     */
    protected $fillable = [
        'ifu',
        'rccm',
        'tel',
        'date_heure',
        'observation_id', // Clé étrangère vers Observation
        'domaine_id', // Clé étrangère vers Domaine
    ];

    /**
     * Relation : une analyse appartient à une observation.
     */
    public function observation()
    {
        return $this->belongsTo(Observation::class, 'observation_id');
    }

    /**
     * Relation : une analyse est liée à un domaine.
     */
    public function domaine()
    {
        return $this->belongsTo(Domain::class, 'domaine_id');
    }
}
