<?php

namespace App\Models;

use App\Enums\ActionTypeEnum;
use App\Enums\PropertiesEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertiesTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'property',
        'action_type',
        'value',
        'value_before',
    ];

    protected $casts = [
        'property' => PropertiesEnum::class,
        'action_type' => ActionTypeEnum::class,
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
