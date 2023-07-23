<?php

namespace Tests\Feature\Film;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\FilmTestCase;

class SpeciesTest extends FilmTestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     */
    public function test_species(): void
    {
        $this->createAuthUser();
        $species = $this->createSpecies(rand(5,9));
        $response = $this->getJson(route('species'))->assertOk();  // ->assertStatus(200)
        $this->assertSameSize($species, $response->decodeResponseJson()['data']);
        $this->assertEquals(count($species), count($response->decodeResponseJson()['data']));
    }
}
