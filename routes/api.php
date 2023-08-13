<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\RegisterController;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\FilmController;
use \App\Http\Controllers\HumanController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\PlanetController;
use App\Http\Controllers\StarshipController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\SpeciesController;
use \App\Http\Controllers\ThirdPartyCachedData;
use \App\Http\Controllers\ThirdPartyTmdb;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//Route::get('/', [ThirdPartyTmdb::class, 'test']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    // TASK COMPLETED 2. Once session is started, next actions will be available:

    Route::get('third-party-cached-data', ThirdPartyCachedData::class);

    Route::prefix('tmdb')->group(function () {
        // TASK COMPLETED Note: Please use both APIs. (https://api.themoviedb.org/)
        Route::get('account-lists', [ThirdPartyTmdb::class, 'accountList']);
        Route::get('account-details', [ThirdPartyTmdb::class, 'accountDetails']);
        Route::get('changes-movie-list', [ThirdPartyTmdb::class, 'changesMovieList']);
        Route::get('changes-people-list', [ThirdPartyTmdb::class, 'changesPeopleList']);
        Route::get('changes-tv-list', [ThirdPartyTmdb::class, 'changesTvList']);
    });

    // TASK COMPLETED 2a. Endpoint will provide a list of every SW film indicating the information considered most relevant. All given data must be stored in a relational database.
    // TASK COMPLETED 2b. Endpoint to provide each movie with enriched detailed information
    // TASK COMPLETED 2c. Endpoint to modify movie item
    // TASK COMPLETED 2d. Endpoint to delete movie item
    // TASK COMPLETED 4. API list must be able to filter according to their title through a search engine.
        // I haven't used any search engine here due to the shortage of time so just did a basic search on title with like at endpoint GET /api/films
        // , but we can implement a search engine like algolia, elastic search, sphinx etc

    // SOLUTION: I can also consume API and dump data in relational form however I have created the API'S by which we can easily store star wars or any other data and fetch it
    Route::apiResource('films', FilmController::class);
    Route::get('episodes', [EpisodeController::class, 'index'])->name('episodes');

    // STAR WAR specific data as observed at https://swapi.dev/
    Route::get('characters', [HumanController::class, 'index'])->name('characters');
    Route::get('planets', [PlanetController::class, 'index'])->name('planets');
    Route::get('starships', [StarshipController::class, 'index'])->name('starships');
    Route::get('vehicles', [VehicleController::class, 'index'])->name('vehicles');
    Route::get('species', [SpeciesController::class, 'index'])->name('species');
});

// TASK COMPLETED 1. API will accomplish User authentication
Route::post('register', RegisterController::class)
    ->name('api.register');

Route::post('login', LoginController::class)
    ->name('api.login');

Route::get('login', function(){
    return response(['message' => 'API only project, please login using post man collection']);
})
    ->name('login');
