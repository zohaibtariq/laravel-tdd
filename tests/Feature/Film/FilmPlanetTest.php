<?php

namespace Tests\Feature\Film;

use App\Models\FilmPlanet;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\FilmTestCase;

class FilmPlanetTest extends FilmTestCase
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
    public function test_a_film_have_many_planets(): void
    {
        // Arrangements
        $film = $this->createFilm();
        $planets = $this->createPlanets(3);
        $planet = $planets->last();

        // Actions
        $film->planets()->sync($planets);

        // Assertions
        $this->assertSameSize($planets, $film->planets);
        $this->assertEquals(count($planets), count($film->planets));
        $this->assertDatabaseHas((new FilmPlanet)->getTable(), [
            'film_id' => $film->id,
            'planet_id' => $planet->id,
        ]);
        $this->assertTrue($film->planets->contains($planet));
        $this->assertTrue($planet->films->contains($film));
    }
}
