<?php

namespace App\Models;

use App\Models\Explorers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable = [
        'valor',
        'locations_id',
        'nome',
        'explorers_id'
    
    ];

    public function explorador()
    {
        return $this->belongsTo(Explorers::class, 'explorers_id');
    }

    public function location()
    {
        return $this->hasMany(Locations::class, 'locations_id');
    }
}
