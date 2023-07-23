<?php

namespace Tests\Feature\Film;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\FilmTestCase;

class CharactersTest extends FilmTestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     */
    public function test_characters(): void
    {
        $this->createAuthUser();
        $characters = $this->createCharacters(rand(5,9));
        $response = $this->getJson(route('characters'))->assertOk();  // ->assertStatus(200)
        $this->assertSameSize($characters, $response->decodeResponseJson()['data']);
        $this->assertEquals(count($characters), count($response->decodeResponseJson()['data']));
    }
}
