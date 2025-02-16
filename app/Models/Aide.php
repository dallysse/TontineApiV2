<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AidePrevus extends Model
{
    use HasFactory;
    protected $table = "Aides";
    protected $fillable = ['id_aide_prevus', 'id_aide','id_membre','id_session', 'date_versement' ,'commentaire', 'date_butoire'];

}
