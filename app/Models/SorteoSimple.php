<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SorteoSimple extends Model
{
    use HasFactory;
    protected $table = 'simple';

    protected $fillable = [
        'id',
        'user_id',
        'fecha_registro',
    ];
}
