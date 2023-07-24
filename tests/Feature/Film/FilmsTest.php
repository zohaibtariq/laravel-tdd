<?php

namespace Tests\Feature\Film;

use App\Models\Film;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\FilmTestCase;

class FilmsTest extends FilmTestCase
{
    // TASK COMPLETED TDD approach required
    use DatabaseMigrations;
    use RefreshDatabase;
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();
        $this->createAuthUser();
    }

    public function test_film_can_be_stored(){
        $film = Film::factory()->make()->toArray();
        $this->postJson(route('films.store'), $film)
            ->assertCreated();
        $this->assertDatabaseHas((new Film())->getTable(), $film);
    }

    public function test_film_can_not_be_stored_on_invalid_data(){
        $this->withExceptionHandling();
        $film = Film::factory()->make()->toArray();
        unset($film['director_id']);
        unset($film['producer_id']);
        $this->postJson(route('films.store'), $film)
            ->assertUnprocessable()  // ->assertStatus(422)
            ->assertJsonValidationErrors(['director_id', 'producer_id']);
        $this->assertDatabaseMissing((new Film())->getTable(), ['title' => $film['title']]);
    }

    public function test_film_can_be_show(){
        $film = $this->createFilm();
        $this->getJson(route('films.show', $film->id))
            ->assertOk();
        $this->assertDatabaseHas((new Film())->getTable(), ['id' => $film->id]);
    }

    public function test_film_should_not_be_show(){
        $this->withExceptionHandling();
        $randomFilmId = rand(99,9999);
        $this->getJson(route('films.show', $randomFilmId))
            ->assertNotFound();
        $this->assertDatabaseMissing((new Film())->getTable(), ['id' => $randomFilmId]);
    }

    public function test_update_film(){
        $this->withExceptionHandling();
        $film = $this->createFilm();
        $newFilmTitle = 'New Film Title';
        $this->patchJson(route('films.update', $film->id), ['title' => $newFilmTitle])
            ->assertOk();
        $this->assertDatabaseHas((new Film())->getTable(), ['id' => $film->id, 'title' => $newFilmTitle]);
    }

    public function test_sync_update_film(){
        $this->withExceptionHandling();
        $film = $this->createFilm();

        $characters = $this->createCharacters(3);
        $starships = $this->createStarships(3);
        $species = $this->createSpecies(3);
        $planets = $this->createPlanets(3);
        $vehicles = $this->createVehicles(3);

        $this->patchJson(route('films.update', $film->id), [
            'characters_ids' => $characters->pluck('id')->toArray(),
            'starships_ids' => $starships->pluck('id')->toArray(),
            'species_ids' => $species->pluck('id')->toArray(),
            'planets_ids' => $planets->pluck('id')->toArray(),
            'vehicles_ids' => $vehicles->pluck('id')->toArray(),
        ])
            ->assertOk();

        $this->assertSameSize($film->characters, $characters);
        $this->assertEquals(count($film->characters), count($characters));

        $this->assertSameSize($film->starships, $starships);
        $this->assertEquals(count($film->starships), count($starships));

        $this->assertSameSize($film->species, $species);
        $this->assertEquals(count($film->species), count($species));

        $this->assertSameSize($film->planets, $planets);
        $this->assertEquals(count($film->planets), count($planets));

        $this->assertSameSize($film->vehicles, $vehicles);
        $this->assertEquals(count($film->vehicles), count($vehicles));


    }

    public function test_delete_film(){
        $this->withExceptionHandling();
        $film = $this->createFilm();
        $this->deleteJson(route('films.destroy', $film->id))
            ->assertNoContent();
        $this->assertDatabaseMissing((new Film())->getTable(), ['id' => $film->id]);
    }

    /**
     * A basic feature test example.
     */
    public function test_films_listing(): void
    {
        $films = $this->createFilms(rand(5,9));
        $response = $this->getJson(route('films.index'))->assertOk();  // ->assertStatus(200)
        $this->assertSameSize($films, $response->decodeResponseJson()['data']);
        $this->assertEquals(count($films), count($response->decodeResponseJson()['data']));
    }
}
