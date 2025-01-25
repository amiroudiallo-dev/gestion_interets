<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Analysis;

class SecondRegister extends Model
{
    //
    protected $fillable = [
        'numero_ordre',
        'date_heure',
        'objet',
        'observation',
    ];


    /**
     * Relation : un 2e registre peut être lié à une analyse.
     */
    public function analysis()
    {
        return $this->hasOne(Analysis::class, 'numero_ordre', 'numero_ordre');
    }
}
