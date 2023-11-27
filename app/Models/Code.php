<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;
    protected $table = 'codes';

    protected $fillable = [
        'id',
        'user_id',
        'product_id',
        'codigo',
        'estado',
    ];
}
