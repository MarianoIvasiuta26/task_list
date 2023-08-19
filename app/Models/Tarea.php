<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre_tarea',
        'fecha_vencimiento',
        'hora_vencimiento',
        'prioridad',
        'completado',
    ];

}
