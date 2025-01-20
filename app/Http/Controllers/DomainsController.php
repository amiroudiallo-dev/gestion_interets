<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Domain;

class DomainsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $domains = Domain::paginate(10);
        return view('domains.index', compact('domains'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('domains.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'string|max:255'
        ]);

        Domain::create($request->all());

        return redirect()->route('domains.index')->with('success', 'Domaine ajoutée avec succès.');
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
    public function edit(Domain $domain)
    {
        //
        return view('domains.edit', compact('domain'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'string|max:255'
        ]);
        $domain = Domain::findOrFail($id);

        $domain->update($request->all());

        return redirect()->route('domains.index')->with('success', 'Domaine modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Domain $domain)
    {
        //
        $domain->delete();

        return redirect()->route('domains.index')->with('success', 'Domaine supprimée avec succès.');

    }
}
