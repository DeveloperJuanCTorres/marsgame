<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'promocion',
        'monto',
        'duracion',
        'beneficio1',
        'beneficio2',
        'beneficio2',
        'beneficio4',
        'imagen',
    ];
}
