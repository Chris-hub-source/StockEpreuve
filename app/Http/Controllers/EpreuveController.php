<?php

namespace App\Http\Controllers; 


use Illuminate\Http\Request;
use App\Models\Epreuve;
use App\Models\TypeEpreuve;
use App\Models\Matiere;
class EpreuveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 
         $epreuves=Epreuve::all();
         $matieres = Matiere::all();
        return view('epreuve', compact('epreuves', 'matieres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
        $matieres = Matiere::all();
        $epreuves= Epreuve::all();

        return view('epreuve', compact('epreuves', 'matieres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation des données
        $request->validate([
            'titre' => 'required|string|max:255',
            'fichier' => 'required|file|mimes:pdf|max:10240', // 10MB max'
            'annee' => 'required|string|max:2100',
            'matiere_id' => 'required|exists:matieres,id',
          

        ]);


        // stockage du fichier
      $cheminFichier = $request->file('fichier')->store('epreuves', 'public');
         

        // création de l'épreuve
        Epreuve::create([
            'titre' => $request->titre,
            'fichier' => $cheminFichier,
            'annee' => $request->annee,
            'matiere_id' => $request->matiere_id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Epreuve créée avec succès.');
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
          $epreuves = Epreuve::findOrFail($id);
       return view('epreuve', compact('epreuves'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'titre' => 'required|string|max:255',
            'fichier' => 'nullable|file|mimes:pdf|max:10240', // 10MB max'
            'annee' => 'required|string|max:2100',
        ]);

        $epreuve = Epreuve::findOrFail($id);

        // Mise à jour des champs de base
        $epreuve->titre = $request->titre;
        $epreuve->annee = $request->annee;

        // Si un nouveau fichier est envoyé
        if ($request->hasFile('fichier')) {
            // Supprimer l'ancien fichier s'il existe
            if ($epreuve->fichier && \Storage::disk('public')->exists($epreuve->fichier)) {
                \Storage::disk('public')->delete($epreuve->fichier);
            }
            // Stocker le nouveau fichier
            $cheminFichier = $request->file('fichier')->store('epreuves', 'public');
            $epreuve->fichier = $cheminFichier;
        }

        $epreuve->save();
    return redirect()->route('epreuve.index')->with('success', 'Epreuve modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

         $epreuves = Epreuve::findOrFail($id);
         $epreuves->delete();
         return redirect()->route('epreuve.create')->with('success', 'Epreuve supprimé avec success');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $epreuves = Epreuve::Where('titre', 'like', "%$query%")
                   // ->orWhere('matiere', 'like', "%$query%")
                    ->paginate(5);
         return view('recherche', compact('epreuves'));    
    }

    public function parMatiere($matiere_id)
    {
        $matiere = Matiere::findOrFail($matiere_id);
        $epreuves = Epreuve::where('matiere_id', $matiere_id)->get();
        return view('epreuve_par_matiere', compact('matiere', 'epreuves'));
    }

    public function download($id){

        $epreuve = Epreuve::findOrFail($id);
        $path = storage_path('app/public/' . $epreuve->fichier);
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        $filename = $epreuve->titre . '.' . $extension;
        return response()->download($path, $filename);
    }
}
