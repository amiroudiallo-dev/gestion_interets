<?php

namespace App\Http\Controllers;

use App\Models\FirstRegister;
use App\Models\Observation;
use App\Models\Domain;
use Illuminate\Http\Request;

class FirstRegisterController extends Controller
{
    /**
     * Affiche la liste des entrées du premier registre.
     */
    public function index()
    {
        $firstRegisters = FirstRegister::with('observation')->paginate(10);
        return view('first_registers.index', compact('firstRegisters'));
    }

    /**
     * Affiche le formulaire pour créer une nouvelle entrée.
     */
    public function create()
    {
        $observations = Observation::all();
        $domains = Domain::all();
        return view('first_registers.create', compact('observations', 'domains'));
    }

    /**
     * Enregistre une nouvelle entrée dans le premier registre.
     */
    public function store(Request $request)
    {
        // dd('dans le store');
        $request->validate([
            'date_heure' => 'required|date',
            'soumissionnaire' => 'required|string',
            'numero_envelop' => 'required|string',
            'tel' => 'required|string',
            'domain_id' => 'nullable|exists:domains,id',
            'observation_id' => 'nullable|exists:observations,id',
        ]);
        // dd($request);
        FirstRegister::create($request->all());

        return redirect()->route('first_registers.index')->with('success', 'Enregistrement ajouté avec succès.');
    }

    /**
     * Affiche le formulaire pour modifier une entrée existante.
     */
    public function edit(FirstRegister $firstRegister)
    {
        $observations = Observation::all();
        return view('first_registers.edit', compact('firstRegister', 'observations'));
    }

    /**
     * Met à jour une entrée existante.
     */
    public function update(Request $request, FirstRegister $firstRegister)
    {
        $request->validate([
            'date_heure' => 'required|date',
            'soumissionnaire' => 'required|string',
            'numero_envelop' => 'required|string',
            'numero_archiv' => 'required|string',
            'observation_id' => 'nullable|exists:observations,id',
            'tel' => 'required|string',
        ]);

        $firstRegister->update($request->all());

        return redirect()->route('first_registers.index')->with('success', 'Enregistrement mis à jour avec succès.');
    }

    /**
     * Supprime une entrée du premier registre.
     */
    public function destroy(FirstRegister $firstRegister)
    {
        $firstRegister->delete();
        return redirect()->route('first_registers.index')->with('success', 'Enregistrement supprimé avec succès.');
    }
}
