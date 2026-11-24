<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EntradaMensal extends Model
{
    protected $table = 'entrada_mensals';

    protected $fillable = [
        'entrada_id',
        'mes',
        'ano',
        'valor',
        'recebida',
    ];

    protected $casts = [
        'valor' => 'decimal:2',
        'recebida' => 'boolean',
    ];

    public function entrada(): BelongsTo
    {
        return $this->belongsTo(Entrada::class);
    }
}
