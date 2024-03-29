<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $fillable = [
        'curso_nombre',
        'curso_descripcion',
        'curso_estado'
    ];
     protected $table='curso';
     protected $primaryKey= 'curso_id';
    
     public $timestamps = false;
}
