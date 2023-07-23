<?php

namespace Database\Seeders;

use App\Models\Planet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Planet::factory()->count(10)->create();
    }
}
