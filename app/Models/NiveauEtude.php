<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NiveauEtude extends Model
{
    //
    use HasFactory;
    protected $fillable = ['nom', 'filiere_id'];

    public function matieres()
    {
        return $this->hasMany(Matiere::class);
    }

    public function filiere(){
        return $this->belongsTo(Filiere::class);
    }

}
