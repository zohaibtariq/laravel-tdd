<?php

namespace Tests\Feature\Film;

use App\Models\FilmCharacter;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\FilmTestCase;

class FilmCharacterTest extends FilmTestCase
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
    public function test_a_film_have_many_characters(): void
    {
        // Arrangements
        $film = $this->createFilm();
        $characters = $this->createCharacters(3);
        $character = $characters->last();

        // Actions
        $film->characters()->sync($characters);

        // Assertions
        $this->assertSameSize($characters, $film->characters);
        $this->assertEquals(count($characters), count($film->characters));
        $this->assertDatabaseHas((new FilmCharacter())->getTable(), [
            'film_id' => $film->id,
            'human_id' => $character->id,
        ]);
        $this->assertTrue($film->characters->contains($character));

        $this->assertTrue($character->films->contains($film));
    }
}
