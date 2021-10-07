<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biography extends Model
{
    use HasFactory;

    protected static $fillables = [
        'name',
        'years_old',
        'birthplace',
        'race',
    ];

    protected static $rules = [
        'name' => 'required|string',
        'years_old' => 'required|integer',
        'birthplace' => 'required|string',
        'race' => 'required|string',
    ];

}
