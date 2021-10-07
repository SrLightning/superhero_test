<?php

namespace Database\Factories;

use App\Models\Biography;
use App\Models\Powerstat;
use App\Models\Superhero;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuperheroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Superhero::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $biography = Biography::factory()->state([
            'name' => $this->faker->name,
            'years_old' => Biography::createRandomBirthdate(),
            'birthplace' => Biography::createRandomBirthdate(),
            'race' => Biography::createRandomRace(),
        ]);

        $powerstat = Powerstat::factory()->state([
            'intelligence' => rand(0, 100),
            'speed' => rand(0, 100),
            'power' => rand(0, 100),
            'durability' => rand(0, 100),
        ]);

        return [
            'alter_ego' => Superhero::createRandomSuperheroName(),
            'powerstat_id' => $powerstat->id,
            'biography_id' => $biography->id,
        ];
        
    }
    

}
