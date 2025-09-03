<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EpreuveController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\NiveauEtudeController;
use App\Http\Controllers\MatiereController;



Route::get('/', [AccueilController::class, 'index'])->name('accueil.index');
Route::middleware(['auth'])->group(function () {
Route::post('Epreuve', [EpreuveController::class, 'store'])->name('epreuve.store');
Route::get('Epreuve/create', [EpreuveController::class, 'create'])->name('epreuve.create');
Route::post('Filiere', [FiliereController::class, 'store'])->name('filiere.store');
Route::get('Filiere/create', [FiliereController::class, 'create'])->name('filiere.create');
Route::post('Niveau', [NiveauEtudeController::class, 'store'])->name('niveau.store');
Route::get('Niveau/create', [NiveauEtudeController::class, 'create'])->name('niveau.create');
Route::post('Matiere', [MatiereController::class, 'store'])->name('matiere.store');
Route::get('Matiere/create', [MatiereController::class, 'create'])->name('matiere.create');
Route::delete('/filiere/{id}', [FiliereController::class, 'destroy'])->name('filiere.destroy');
Route::delete('/matiere/{id}', [MatiereController::class, 'destroy'])->name('matiere.destroy');
Route::delete('/niveau/{id}', [NiveauEtudeController::class, 'destroy'])->name('niveau.destroy');
Route::delete('/epreuve/{id}', [EpreuveController::class, 'destroy'])->name('epreuve.destroy');
});
Route::get('/epreuve/dowload/{id}', [EpreuveController::class, 'download'])->name('epreuve.download');
Route::get('search', [EpreuveController::class, 'search'])->name('search');
Route::get('/niveau-etudes-by-filiere/{filiere}', [NiveauEtudeController::class, 'getByFiliere']);
Route::get('/matieres/niveau/{niveau_id}', [MatiereController::class, 'parNiveau'])->name('matieres.parNiveau');
Route::get('/epreuves/matiere/{matiere_id}', [EpreuveController::class, 'parMatiere'])->name('epreuves.parMatiere');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
