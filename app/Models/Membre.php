<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use HasFactory;
    protected $table = "Membres";
    protected $fillable = ['id_membre', 'nom', 'prenom', 'formation', 'date_naissance'];
}
