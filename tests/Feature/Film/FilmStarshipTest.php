<?php

namespace Tests\Feature\Film;

use App\Models\FilmStarship;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\FilmTestCase;

class FilmStarshipTest extends FilmTestCase
{
    use RefreshDatabase;
    use WithFaker;
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * A basic feature test example.
     */
    public function test_a_film_have_many_starships(): void
    {
        // Arrangements
        $film = $this->createFilm();
        $starships = $this->createStarships(3);
        $starship = $starships->last();

        // Actions
        $film->starships()->sync($starships);

        // Assertions
        $this->assertSameSize($starships, $film->starships);
        $this->assertEquals(count($starships), count($film->starships));
        $this->assertDatabaseHas((new FilmStarship())->getTable(), [
            'film_id' => $film->id,
            'starship_id' => $starship->id,
        ]);
        $this->assertTrue($film->starships->contains($starship));
        $this->assertTrue($starship->films->contains($film));
    }
}
