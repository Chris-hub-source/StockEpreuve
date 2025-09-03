<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiere;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $filieres = Filiere::all();
        return view('filiere', compact('filieres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         $filieres = Filiere::all();
        return view('filiere', compact('filieres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 
        $request->validate([
            'nom' => 'required|string|max:255',
            
        ]);


         Filiere::create([
            'nom' => $request->nom,
         ]);

          return redirect()->route('filiere.create')->with('success', 'Filière créée avec succès.');
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
        $filiere = Filiere::findOrFail($id);
        return view ('filiere', compact('filiere'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);
        $filiere = Filiere::findOrFail($id);
        $filiere->nom = $request->nom;
        $filiere->save();

        return view('filiere');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $filiere = Filiere::findOrFail($id);
        $filiere->delete();
        return redirect()->route('filiere.create')->with('success', 'Filiere supprimer avec success');
    }
}
