<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matiere;
use App\Models\Filiere;
use App\MOdels\NiveauEtude;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $matieres= Matiere::all();
        $filieres= Filiere::all();
        return view('matiere', compact('matieres', 'filieres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $matieres= Matiere::all();
        $niveauEtudes= NiveauEtude::all();
        $filieres= Filiere::all();
        return view('matiere', compact('niveauEtudes', 'filieres', 'matieres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'nom' => 'required|string|max:255',
            'niveau_etude_id' => 'required|exists:niveau_etudes,id',
        ]);

        Matiere::create([
            'nom' => $request->nom,
            'niveau_etude_id' => $request->niveau_etude_id,
        ]);

        return redirect()->back()->with('success', 'Matiere ajouté avec success');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $matiere = Matiere::findOrfail($id);
        $matiere->delete();
        return redirect()->route('matiere.create')->with('success', 'Matiere supprimé avec success');
    }

    public function parNiveau($niveau_id){

        $niveau = NiveauEtude::findOrFail($niveau_id);
        $matieres = Matiere:: where('niveau_etude_id', $niveau_id)->get();
        return view('matieres_par_niveau', compact('niveau','matieres'));
    }
}
