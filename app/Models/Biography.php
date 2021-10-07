<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biography extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'years_old',
        'birthplace',
        'race',
    ];

    protected static $rules = [
        'name' => 'required|string',
        'years_old' => 'nullable|integer',
        'birthplace' => 'required|string',
        'race' => 'required|string',
    ];

    /**
     * Special validations to create random
     */
    public static function createRandomAge() : string 
    {
        return rand(20, 40);
    }
    public static function createRandomBirthdate() : string 
    {
        $date = mt_rand(378691200000,943920000000);

        $birth_date = date("Y-m-d H:i:s", ($date / 1000));

        return $birth_date;
    }

    public static function createRandomRace() : string 
    {
        $races_available = [
            'Human',
            'Alien', ];

        return $races_available[array_rand($races_available)];
    } 

}
