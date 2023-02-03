<?php

namespace App\Models;

use App\Enums\ActionTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        "action_type"
    ];

    protected $cast = [
        'action_type' => ActionTypeEnum::class
    ];
}
