<?php

namespace Tests\Feature\Film;

use App\Models\FilmVehicle;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\FilmTestCase;

class VehicleFilmTest extends FilmTestCase
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
    public function test_a_vehicle_have_many_films(): void
    {
        // Arrangements
        $films = $this->createFilms();
        $vehicle = $this->createVehicle();
        $film = $films->last();

        // Actions
        $vehicle->films()->sync($films);

        // Assertions
        $this->assertSameSize($films, $vehicle->films);
        $this->assertEquals(count($films), count($vehicle->films));
        $this->assertDatabaseHas((new FilmVehicle)->getTable(), [
            'film_id' => $film->id,
            'vehicle_id' => $vehicle->id,
        ]);
        $this->assertTrue($film->vehicles->contains($vehicle));
        $this->assertTrue($vehicle->films->contains($film));
    }
}
