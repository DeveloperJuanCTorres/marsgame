<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscription extends Model
{
    use HasFactory;
    protected $table = 'suscriptions';

    protected $fillable = [
        'id',
        'user_id',
        'pay_id',
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'fecha'
    ];
}
