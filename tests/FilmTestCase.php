<?php

namespace Tests;

use App\Models\Episode;
use App\Models\Film;
use App\Models\Human;
use App\Models\Planet;
use App\Models\Species;
use App\Models\Starship;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\WithFaker;
//use Laravel\Sanctum\Sanctum;

abstract class FilmTestCase extends TestCase
{
    use CreatesApplication;
    use WithFaker;

    function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
        $this->setUpFaker();
    }

    function createFilm(){
        $director = Human::factory()->create();
        $producer = Human::factory()->create();
        $episode = Episode::factory()->create();
        return Film::factory()->create([
            'director_id' => $director->id,
            'producer_id' => $producer->id,
            'episode_id' => $episode->id,
        ]);
    }

    function createFilms($count = 1, $args = []){
        $director = Human::factory()->create();
        $producer = Human::factory()->create();
        $episode = Episode::factory()->create();
        return Film::factory()->count($count)->create(array_merge([
            'director_id' => $director->id,
            'producer_id' => $producer->id,
            'episode_id' => $episode->id,
        ], $args));
    }

    function createVehicles($count = 1, $args = []){
        return Vehicle::factory()->count($count)->create($args);
    }

    function createVehicle($args = []){
        return Vehicle::factory()->create($args);
    }

    function createCharacters($count = 1, $args = []){
        return Human::factory()->count($count)->create($args);
    }

    function createCharacter($args = []){
        return Human::factory()->create($args);
    }

    function createEpisodes($count = 1, $args = []){
        return Episode::factory()->count($count)->create($args);
    }

    function createEpisode($args = []){
        return Episode::factory()->create($args);
    }

    function createPlanets($count = 1, $args = []){
        return Planet::factory()->count($count)->create($args);
    }

    function createPlanet($args = []){
        return Planet::factory()->create($args);
    }

    function createStarships($count = 1, $args = []){
        return Starship::factory()->count($count)->create($args);
    }

    function createStarship($args = []){
        return Starship::factory()->create($args);
    }

    function createSpecies($count = 1, $args = []){
        return Species::factory()->count($count)->create($args);
    }

    function createSpecie($args = []){
        return Species::factory()->create($args);
    }

//    function createToDoLists($args = [])
//    {
//        // TodoList::factory()->count(1)->create() && TodoList::factory()->create() are not same
//        // count() creates array of objects while without count give direct individual model object
//        return TodoList::factory()->count(2)->create($args);
//    }
//
//    function createTasks($args = [])
//    {
//        return Task::factory()->count(1)->create($args);
//    }
//
//    function createUser($args = []){
//        return User::factory()->create($args);
//    }
//
//    function createAuthUser(){
//        $user = $this->createUser();
//        Sanctum::actingAs($user);
//        return $user;
//    }
//
//    function createLabel($args = []){
//        return Label::factory()->create($args);
//    }

}
