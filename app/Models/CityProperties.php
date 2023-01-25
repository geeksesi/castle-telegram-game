<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityProperties extends Model
{
    use HasFactory;

    protected $fillable = [
        'population',
        'food',
        'iron',
        'wood',
        'stone',
        'swordsman',
        'archer',
        'knight',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
