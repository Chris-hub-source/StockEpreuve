<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Epreuve extends Model
{
    //
    use HasFactory;

   protected $fillable= ['titre', 'fichier', 'annee','matiere_id','type_epreuve_id','user_id'];

    // une epreuve appartient à un administrateur
    public function user(){
        return $this ->belongsTo(User::class);
    }

    public function matiere(){
        return $this->belongsTo(Matiere::class);
    }

    public function telechargeurs(){

        return $this->belongsToMany(User::class,'epreuve_user');
    }

}
