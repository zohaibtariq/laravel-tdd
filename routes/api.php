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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('films', FilmController::class);

    Route::get('characters', [HumanController::class, 'index'])->name('characters');
    Route::get('episodes', [EpisodeController::class, 'index'])->name('episodes');
    Route::get('planets', [PlanetController::class, 'index'])->name('planets');
    Route::get('starships', [StarshipController::class, 'index'])->name('starships');
    Route::get('vehicles', [VehicleController::class, 'index'])->name('vehicles');
    Route::get('species', [SpeciesController::class, 'index'])->name('species');
});

Route::post('register', RegisterController::class)
    ->name('api.register');

Route::post('login', LoginController::class)
    ->name('api.login');

Route::get('login', function(){
    return response(['message' => 'Please login.']);
})
    ->name('login');
