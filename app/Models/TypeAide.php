<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeAide extends Model
{
    protected $table = "Aide_type";
    protected $fillable = ['id_aide','type_aide'];
}
