<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    use HasFactory;
    protected $table = "Rencontre_Depenses";
    protected $fillable = [ 'id_depense' ,'id_rencontre', 'motif_depense' ,'montant_depense'];
}
