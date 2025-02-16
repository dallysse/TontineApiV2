<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pret extends Model
{
    use HasFactory;
    protected $table = "Prets";
    protected $fillable = [ 'id_pret','id_membre_session', 'date_pret' ,'duree', 'montant', 'interet_generer', 'date_remboursement'];
}
