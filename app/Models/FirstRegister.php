<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Domain;
use App\Models\Observation;

class FirstRegister extends Model
{
    //

    protected $fillable = [
        'date_heure',
        'soumissionnaire',
        'numero_envelop',
        'tel',
        'objet',
        'observation_id',
        'domain_id',
    ];


    /**
     * Get the observation that owns the FirstRegister
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function observation()
    {
        return $this->belongsTo(Observation::class, 'observation_id');
    }

    /**
     * Get the domain that owns the FirstRegister
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function domain()
    {
        return $this->belongsTo(Domain::class, 'domain_id');
    }
}
