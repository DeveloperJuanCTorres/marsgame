<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'tickets';

    protected $fillable = [
        'nombre',
        'monto',
        'duracion',
        'beneficio1',
        'beneficio2',
        'beneficio2',
        'beneficio4',
        'imagen',
        'cantidad_codigos',
        'mensual',
        'cantidad_meses',
        'cantidad_ticket'
    ];
}
