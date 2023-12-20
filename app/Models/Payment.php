<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';

    protected $fillable = [
        'id',
        'user_id',
        'transaction_id',
        'monto',
        'estado',
        'fecha_pago',
        'tipo_pago',
        'carrito'
    ];
}
