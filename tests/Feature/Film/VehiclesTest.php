<?php

namespace Tests\Feature\Film;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\FilmTestCase;

class VehiclesTest extends FilmTestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     */
    public function test_vehicles(): void
    {
        $this->createAuthUser();
        $vehicles = $this->createVehicles(rand(5,9));
        $response = $this->getJson(route('vehicles'))->assertOk();  // ->assertStatus(200)
        $this->assertSameSize($vehicles, $response->decodeResponseJson()['data']);
        $this->assertEquals(count($vehicles), count($response->decodeResponseJson()['data']));
    }
}
