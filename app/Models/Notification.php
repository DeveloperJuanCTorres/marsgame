<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';

    protected $fillable = [
        'id',
        'user_id',
        'codigo_id',
        'estado',
        'user_id_original'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
