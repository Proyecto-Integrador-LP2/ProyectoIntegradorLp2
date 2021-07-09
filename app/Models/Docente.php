<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'docente_cod_docente',
        'docente_descripcion'
    ];
    protected $table='docente';
     public $timestamps = false;
}
