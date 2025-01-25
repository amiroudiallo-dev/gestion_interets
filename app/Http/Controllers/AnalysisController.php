<?php

namespace App\Http\Controllers;

use App\Models\Analysis;
use App\Models\SecondRegister;
use Illuminate\Http\Request;

class AnalysisController extends Controller
{
    /**
     * Liste les analyses.
     */
    public function index()
    {
        $analyses = Analysis::with(['observation', 'domaine'])->paginate(10);
        return view('analyses.index', compact('analyses'));
    }

    /**
     * Crée une nouvelle analyse à partir d’un second registre.
     */
    public function createFromSecondRegister($secondRegisterId)
    {
        $secondRegister = SecondRegister::findOrFail($secondRegisterId);

        Analysis::create([
            'numero_ordre' => $secondRegister->numero_ordre,
            'ifu' => '',
            'rccm' => '',
            'tel' => $secondRegister->tel,
            'date_heure' => $secondRegister->date_heure,
            'observation_id' => $secondRegister->observation_id,
            'domaine_id' => null,
            'conforme' => false,
        ]);

        return redirect()->route('analyses.index')->with('success', 'Analyse créée avec succès.');
    }
}
