<?php

namespace Database\Factories;

use App\Models\Episode;
use App\Models\Human;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3, 5),
            'opening_crawl' => fake()->text(),
            'episode_id' => function() {
                return Episode::factory()->create()->id;
            },
            'director_id' => function() {
                return Human::factory()->create()->id;
            },
            'producer_id' => function() {
                return Human::factory()->create()->id;
            },
            'release_date' => fake()->date(),
        ];
    }
}
