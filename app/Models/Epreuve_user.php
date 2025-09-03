<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class epreuve_user extends Model
{
    //  
    use HasFactory;

   protected $fillable = ['epreuve_id','user_id'];
}
