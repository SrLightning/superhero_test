<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Powerstat extends Model
{
    use HasFactory;

    protected $fillable = [
        'intelligence',
        'speed',
        'power',
        'durability',
    ];

    protected static $rules = [
        'intelligence' => 'integer|required',
        'speed' => 'integer|required',
        'power' => 'integer|required',
        'durability' => 'integer|required',
    ];
}
