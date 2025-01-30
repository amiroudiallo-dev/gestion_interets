<?php

namespace App\Http\Controllers;

use App\Models\SecondRegister;
use App\Models\FirstRegister;
use Illuminate\Http\Request;

class SecondRegisterController extends Controller
{
    /**
     * Affiche la liste des entrées du second registre.
     */
    public function index()
    {
        $offresRecevables = FirstRegister::whereHas('observation', function ($query) {
            $query->where('name', 'RECEVABLE');
        })->paginate(10);

        $secondRegisters = SecondRegister::paginate(10);

        return view('second_registers.index', compact('secondRegisters', 'offresRecevables'));
    }

    public function edit($firstRegisterId)
    {
        $firstRegister = FirstRegister::findOrFail($firstRegisterId);

        if (!$firstRegister->observation || $firstRegister->observation->name !== 'RECEVABLE') {
            return redirect()
                ->route('second_registers.index')
                ->with('error', 'L\'offre sélectionnée n\'est pas recevable.');
        }

        return view('second_registers.edit', compact('firstRegister'));
    }

    /**
     * Enregistre ou met à jour une entrée dans le second registre en gardant le même ID que FirstRegister.
     */
    public function update(Request $request, $firstRegisterId)
    {
        $firstRegister = FirstRegister::findOrFail($firstRegisterId);

        if (!$firstRegister->observation || $firstRegister->observation->name !== 'RECEVABLE') {
            return redirect()
                ->route('first_registers.index')
                ->with('error', 'L\'offre sélectionnée n\'est pas recevable.');
        }

        $request->validate([
            'objet' => 'required|string|max:255',
        ]);

        // Mise à jour ou création dans SecondRegister avec le même ID que FirstRegister
        $secondRegister = SecondRegister::updateOrCreate(
            ['id' => $firstRegister->id],
            [
                'date_heure' => $firstRegister->date_heure,
                'objet' => $request->objet,
                'observation_id' => $firstRegister->observation_id,
            ]
        );

        // Mise à jour de l'objet dans FirstRegister
        $firstRegister->update([
            'objet' => $request->objet,
        ]);

        return redirect()
            ->route('second_registers.index')
            ->with('success', 'L\'offre a été transférée avec succès au second registre.');
    }
}
