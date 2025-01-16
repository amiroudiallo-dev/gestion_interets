<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    public function index()
    {
        $offers = Offre::paginate(10);
        return view('offers.index', compact('offers'));
    }

    public function create()
    {
        return view('offers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'denomination' => 'required|string|max:255',
            'ifu_number' => 'required|string|max:255',
            'rccm_number' => 'required|string|max:255',
            'nature_of_activity' => 'required|string|max:255',
            'contact_info' => 'required|string|max:255',
            'deposit_date' => 'required|date',
            'envelope_number' => 'required|integer',
        ]);

        Offre::create($request->all());

        return redirect()->route('offers.index')->with('success', 'Offre ajoutée avec succès.');
    }

    public function edit(Offre $offer)
    {
        return view('offers.edit', compact('offer'));
    }

    public function update(Request $request, Offre $offer)
    {
        $request->validate([
            'denomination' => 'required|string|max:255',
            'ifu_number' => 'required|string|max:255',
            'rccm_number' => 'required|string|max:255',
            'nature_of_activity' => 'required|string|max:255',
            'contact_info' => 'required|string|max:255',
            'deposit_date' => 'required|date',
            'envelope_number' => 'required|integer',
        ]);

        $offer->update($request->all());

        return redirect()->route('offers.index')->with('success', 'Offre mise à jour avec succès.');
    }

    public function destroy(Offre $offer)
    {
        $offer->delete();

        return redirect()->route('offers.index')->with('success', 'Offre supprimée avec succès.');
    }
}

