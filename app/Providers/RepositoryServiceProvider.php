<?php

namespace App\Providers;

use App\Repositories\FilmRepository;
use App\Repositories\EpisodeRepository;
use App\Repositories\HumanRepository;
use App\Repositories\Interfaces\HumanRepositoryInterface;
use App\Repositories\Interfaces\PlanetRepositoryInterface;
use App\Repositories\Interfaces\SpeciesRepositoryInterface;
use App\Repositories\Interfaces\StarshipRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\VehicleRepositoryInterface;
use App\Repositories\PlanetRepository;
use App\Repositories\SpeciesRepository;
use App\Repositories\StarshipRepository;
use App\Repositories\UserRepository;
use App\Repositories\VehicleRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\FilmRepositoryInterface;
use App\Repositories\Interfaces\EpisodeRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(FilmRepositoryInterface::class, FilmRepository::class); // singleton = bind means replaceable with each other
        $this->app->singleton(EpisodeRepositoryInterface::class, EpisodeRepository::class);
        $this->app->singleton(HumanRepositoryInterface::class, HumanRepository::class);
        $this->app->singleton(PlanetRepositoryInterface::class, PlanetRepository::class);
        $this->app->singleton(SpeciesRepositoryInterface::class, SpeciesRepository::class);
        $this->app->singleton(StarshipRepositoryInterface::class, StarshipRepository::class);
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        $this->app->singleton(VehicleRepositoryInterface::class, VehicleRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

}
