<?php

namespace Database\Seeders;

use App\Models\Starship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StarshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Starship::factory()->count(10)->create();
    }
}
