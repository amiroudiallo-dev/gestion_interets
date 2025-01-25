<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Domain;
use App\Models\Observation;

class Offre extends Model
{
    /**
     * Nom de la table associée au modèle.
     * Si votre table porte un autre nom, décommentez la ligne suivante et modifiez le nom.
     */
    // protected $table = 'offres';

    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array
     */
    protected $fillable = [
        'deposit_date',
        'soumissionnaire',
        'object',
        'envelope_number',
        'observation_id',
        'contact_info',
        'ifu_number',
        'rccm_number',
        'domaine_id',
        'first_register',
        'second_register',

    ];

    /**
     * Les attributs qui doivent être castés en types natifs.
     *
     * @var array
     */
    protected $casts = [
        'deposit_date' => 'date',
        'envelope_number' => 'integer',
        'observation_id' => 'integer',
        'domaine_id' => 'integer',
        'first_register' => 'boolean',
        'second_register' => 'boolean',
    ];

    /**
     * Relation : une offre appartient à un utilisateur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the domains that owns the Offre
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function domains(): BelongsTo
    {
        return $this->belongsTo(Domain::class, 'domain_id');
    }

    /**
     * Get the observation that owns the Offre
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function observation(): BelongsTo
    {
        return $this->belongsTo(Observation::class, 'observation_id');
    }
}
