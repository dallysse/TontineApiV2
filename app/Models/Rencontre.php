<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rencontre extends Model
{
    use HasFactory;
    protected $table = "Rencontres";
    protected $fillable = ['id_rencontre', 'date_rencontre' ,'id_membre_session', 'commentaire', 'lieu'];
}
