<?php

namespace Tests\Feature\Film;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\FilmTestCase;

class PlanetsTest extends FilmTestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     */
    public function test_planets(): void
    {
        $this->createAuthUser();
        $planets = $this->createPlanets(rand(5,9));
        $response = $this->getJson(route('planets'))->assertOk();  // ->assertStatus(200)
        $this->assertSameSize($planets, $response->decodeResponseJson()['data']);
        $this->assertEquals(count($planets), count($response->decodeResponseJson()['data']));
    }
}
