<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
    protected $table = 'wallets';

    protected $fillable = [
        'id',
        'order',
        'monto',
        'vaucher',
        'estado',
        'type',
        'user_id'
    ];
}
