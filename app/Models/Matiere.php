<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matiere extends Model
{
    //
    use HasFactory;

protected $fillable = ['nom','niveau_etude_id'];

  public function epreuves(){
    return $this->hasMany(Epreuve::class);
  } 

  public function niveau_etude(){

    return $this->belongsTo(NiveauEtude::class);
  }
}
