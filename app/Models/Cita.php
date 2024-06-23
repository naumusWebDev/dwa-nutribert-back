<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'dia', 'hora', 'nombre', 'telefono', 'notas'
    ];

    // Aquí podrías definir relaciones con otros modelos si es necesario
}
