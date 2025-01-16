<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        'denomination',
        'ifu_number',
        'rccm_number',
        'nature_of_activity',
        'contact_info',
        'deposit_date',
        'envelope_number',
    ];

    /**
     * Les attributs qui doivent être castés en types natifs.
     *
     * @var array
     */
    protected $casts = [
        'deposit_date' => 'date',
        'envelope_number' => 'integer',
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
}
