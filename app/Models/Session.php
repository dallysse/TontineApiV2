<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $table = "Sessions";
    protected $fillable = ['id_session','session_debut', 'session_fin', 'montant_fond_caisse', 'montant_tontine','montant_collation', 'montant_aide_Dp', 'montant_aide_Dfra','montant_aide_Denf', 'montant_aide_Dpart', 'montant_aide_Nais', 'montant_aide_Mar','Bilan'];
}
