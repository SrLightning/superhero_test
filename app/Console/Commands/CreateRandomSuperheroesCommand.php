<?php

namespace App\Console\Commands;

use App\Models\Biography;
use App\Models\Powerstat;
use App\Models\Superhero;
use Illuminate\Console\Command;

class CreateRandomSuperheroesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create_supers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create 10 random superheroes to save the universe, or something like that';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $items = 10;
        print("\n Generando registros de credenciales en estudiantes \n");
        $bar = $this->output->createProgressBar($items);
        $bar->start();

        for ($i=1; $i < $items ; $i++) { 
            $faker = \Faker\Factory::create();

            $biography = Biography::create([
                'name' => $faker->name(),
                'years_old' => Biography::createRandomAge(),
                'birthplace' => $faker->country(),
                'race' => Biography::createRandomRace(), ]);
    
            $powerstat = Powerstat::create([
                'intelligence' => rand(0, 100),
                'speed' => rand(0, 100),
                'power' => rand(0, 100),
                'durability' => rand(0, 100), ]);
    
            $superhero = Superhero::create([
                'alter_ego' => Superhero::createRandomSuperheroName(),
                'powerstat_id' => $powerstat->id,
                'biography_id' => $biography->id, ]);

            print("\n Superhero ".$superhero->alter_ego." created \n"); 
            $bar->advance();
        }

        $bar->finish();
        print("\n Superheroes created successfuly \n"); 
        return 0;
    }
}
