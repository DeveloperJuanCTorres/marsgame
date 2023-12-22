<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table = 'coupons';

    protected $fillable = [
        'id',
        'name',
        'last_name',
        'dni',
        'email',
        'telefono',
        'codigo_promocional',
        'cantidad'
    ];
}
