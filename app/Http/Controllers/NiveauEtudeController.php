<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NiveauEtude;
use App\Models\Filiere;

class NiveauEtudeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $niveauEtudes= NiveauEtude::all();
        return view('niveau', compact('niveauEtudes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $niveauEtudes= NiveauEtude::all();
        $filieres = Filiere::all();
        return view('niveau', compact('filieres', 'niveauEtudes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nom' => 'required|string|max:255',
            'filiere_id' => 'required|exists:filieres,id',
        ]);

        NiveauEtude::create([
            'nom' => $request->nom,
            'filiere_id' => $request->filiere_id,
        ]);

        return redirect()->route('niveau.create')->with('success','niveau ajouté avec succes');
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
        $niveau = NiveauEtude::findOrFail($id);
        $niveau->delete();
        return redirect()->route('niveau.create')->with('success', 'Niveau supprimé');
    }

    public function getByFiliere( $filiereId){
    
       $niveaux = NiveauEtude::where('filiere_id', $filiereId)->get();
       return response()->json($niveaux);
    }
}
