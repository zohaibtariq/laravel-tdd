<?php

namespace App\Providers;

use App\Repositories\FilmRepository;
use App\Repositories\Interfaces\FilmRepositoryInterface;
use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(FilmRepositoryInterface::class, FilmRepository::class); // singleton = bind means replaceable with each other
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
