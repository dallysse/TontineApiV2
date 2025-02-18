<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amande extends Model
{
    use HasFactory;
    protected $table = "Amandes";
    protected $fillable = ['id_amande', 'id_membre_session','date_amande','motif_amande', 'montant' ,'date_payement'];

}
