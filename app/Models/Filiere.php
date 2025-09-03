<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Filiere extends Model
{
   use HasFactory;
    //
  protected $fillable = ['nom'];

  public function niveaux(){

    return $this->hasMany(NiveauEtude::class);
  }
}
