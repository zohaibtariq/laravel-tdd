<?php

namespace Tests\Feature\Film;

use App\Models\FilmSpecie;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\FilmTestCase;

class FilmSpeciesTest extends FilmTestCase
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
    public function test_a_film_have_many_species(): void
    {
        // Arrangements
        $film = $this->createFilm();
        $species = $this->createSpecies(3);
        $specie = $species->last();

        // Actions
        $film->species()->sync($species);

        // Assertions
        $this->assertSameSize($species, $film->species);
        $this->assertEquals(count($species), count($film->species));
        $this->assertDatabaseHas((new FilmSpecie())->getTable(), [
            'film_id' => $film->id,
            'species_id' => $specie->id,
        ]);
        $this->assertTrue($film->species->contains($specie));
        $this->assertTrue($specie->films->contains($film));
    }
}
