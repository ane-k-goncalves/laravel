<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Troca extends Model
{
    use HasFactory;

    protected $fillable = [
        'explorers_origem_id', 'explorers_destino_id', 'items_origem', 'items_destino'
    ];

    protected $casts = [
        'items_origem' => 'array',
        'items_destino' => 'array'
    ];
}
