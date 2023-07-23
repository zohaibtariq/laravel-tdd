<?php

namespace Tests\Feature\Film;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\FilmTestCase;

class StarshipsTest extends FilmTestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     */
    public function test_starships(): void
    {
        $this->createAuthUser();
        $starships = $this->createStarships(rand(5,9));
        $response = $this->getJson(route('starships'))->assertOk();  // ->assertStatus(200)
        $this->assertSameSize($starships, $response->decodeResponseJson()['data']);
        $this->assertEquals(count($starships), count($response->decodeResponseJson()['data']));
    }
}
