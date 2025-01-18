<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Observation;

class ObservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $observations = Observation::paginate(10);
        return view('observations.index', compact('observations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('observations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Observation::create($request->all());

        return redirect()->route('observations.index')->with('success', 'Observation ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Observation $observation)
    {
        //
        return view('observations.edit', compact('observation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Observation $observation)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $observation->update($request->all());

        return redirect()->route('observations.index')->with('success', 'Observation mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Observation $observation)
    {
        //
        $observation->delete();

        return redirect()->route('observations.index')->with('success', 'Observation supprimée avec succès.');
    }
}
