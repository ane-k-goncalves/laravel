<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Explorers extends Model
{
    use HasFactory;

    protected $table = 'explorers';

    protected $fillable = [
        'nome',
        'idade',
        'inventario',
        'locations_id'
        
    ];

    public function items()
    {
        return $this->hasMany(Items::class);
    }

    public function location()
    {
        return $this->hasMany(Locations::class, 'locations_id');
    }

}
