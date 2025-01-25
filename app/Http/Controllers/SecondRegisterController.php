<?php

namespace App\Http\Controllers;

use App\Models\SecondRegister;
use App\Models\Observation;
use Illuminate\Http\Request;

class SecondRegisterController extends Controller
{
    /**
     * Affiche la liste des entrées du second registre.
     */
    public function index()
    {
        $secondRegisters = SecondRegister::with('observation')->paginate(10);
        return view('second_registers.index', compact('secondRegisters'));
    }

    /**
     * Enregistre une entrée transférée depuis le premier registre.
     */
    public function storeFromFirstRegister($firstRegisterId)
    {
        $firstRegister = FirstRegister::findOrFail($firstRegisterId);

        if (!$firstRegister->observation || $firstRegister->observation->status != 'recevable') {
            return redirect()->route('first_registers.index')->with('error', 'Observation non recevable.');
        }

        SecondRegister::create([
            'date_heure' => $firstRegister->date_heure,
            'objet' => $firstRegister->objet,
            'observation_id' => $firstRegister->observation_id,
        ]);

        return redirect()->route('second_registers.index')->with('success', 'Données transférées avec succès.');
    }
}
