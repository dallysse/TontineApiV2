<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembreSession extends Model
{
    use HasFactory;
    protected $table = "Membres_sessions";
    protected $fillable = ['id_session', 'id_membre', 'mois_encaissement', 'Actif'];

    public $incrementing = false;
    public $timestamps = false;

}
