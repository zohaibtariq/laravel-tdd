<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(HumanSeeder::class);
        $this->call(EpisodeSeeder::class);
        $this->call(FilmSeeder::class);
        $this->call(PlanetSeeder::class);
        $this->call(StarshipSeeder::class);
        $this->call(VehicleSeeder::class);
        $this->call(SpeciesSeeder::class);

    }
}
