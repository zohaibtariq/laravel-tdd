<?php

namespace Tests\Feature\Film;

use App\Models\FilmVehicle;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\FilmTestCase;

class FilmVehicleTest extends FilmTestCase
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
    public function test_a_film_have_many_vehicles(): void
    {
        // Arrangements
        $film = $this->createFilm();
        $vehicles = $this->createVehicles(3);
        $vehicle = $vehicles->last();

        // Actions
        $film->vehicles()->sync($vehicles);

        // Assertions
        $this->assertSameSize($vehicles, $film->vehicles);
        $this->assertEquals(count($vehicles), count($film->vehicles));
        $this->assertDatabaseHas((new FilmVehicle)->getTable(), [
            'film_id' => $film->id,
            'vehicle_id' => $vehicle->id,
        ]);
        $this->assertTrue($film->vehicles->contains($vehicle));
        $this->assertTrue($vehicle->films->contains($film));
    }
}
