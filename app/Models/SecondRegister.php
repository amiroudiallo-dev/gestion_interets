<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Analysis;

class SecondRegister extends Model
{
    //
    protected $table = 'second_registers';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'numero_ordre',
        'date_heure',
        'objet',
        'observation_id',
    ];

    protected $primaryKey = 'id';


    /**
     * Relation : un 2e registre peut être lié à une analyse.
     */
    public function analysis()
    {
        return $this->hasOne(Analysis::class, 'numero_ordre', 'numero_ordre');
    }
    public function observation()
    {
        return $this->belongsTo(Observation::class);
    }

}
