<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SorteoSmash extends Model
{
    use HasFactory;
    protected $table = 'smash';

    protected $fillable = [
        'id',
        'user_id',
        'fecha_registro',
    ];
}
