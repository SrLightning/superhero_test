<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Superhero extends Model
{
    use HasFactory;

    protected $with = [
        'powerstat',
        'biography',
    ];

    protected $fillable = [
        'alter_ego',
        'powerstat_id',
        'biography_id',
    ];

    protected static $rules = [
        'alter_ego' => 'string|required',
        'powerstat_id' => 'integer|required',
        'biography_id' => 'integer|required',
    ];


    public function powerstat()
    {
        return $this->belongsTo(Powerstat::class, 'powerstat_id');
    }

    public function biography()
    {
        return $this->belongsTo(Biography::class, 'biography_id');
    }

    /**
     * Special validations to create random
     */

    public static function createRandomSuperheroName() : string 
    {
        $animals = [
            'Cow',
            'Sheep',
            'Bat',
            'Horse',
            'Tiger',
            'Lion',
            'Parrot',
            'Bear',
            'Frog',
        ];

        $gender = [
            'man',
            'woman',
        ];

        return $animals[array_rand($animals, 1)] .''. $gender[array_rand($gender, 1)];
    }
}
