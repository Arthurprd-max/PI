<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $table = 'entradas';

    protected $fillable = [
        'descricao',
        'valor',
        'tipo',
        'data',
        'user_id'
    ];

    protected $casts = [
        'valor' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}