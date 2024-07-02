<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    use HasFactory;

    protected $table = 'locations';

    protected $fillable = [
        'latitude',
        'longitude',
        
    ];

    public function explorador()
    {
        return $this->belongsTo(Explorers::class);
    }


    public function items()
    {
        return $this->belongsTo(Items::class);
    }



}
