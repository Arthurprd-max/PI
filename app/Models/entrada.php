<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Entrada extends Model
{
    protected $table = 'entradas';

    protected $fillable = [
        'descricao',
        'valor',
        'tipo',
        'ativa',
    ];

    protected $casts = [
        'valor' => 'decimal:2',
        'ativa' => 'boolean',
    ];

    public function valoresMensais(): HasMany
    {
        return $this->hasMany('App\\Models\\EntradaMensal');
    }
}
