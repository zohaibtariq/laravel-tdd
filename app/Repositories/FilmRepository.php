<?php

namespace App\Repositories;

use App\Models\Film;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Interfaces\FilmRepositoryInterface;

class FilmRepository implements FilmRepositoryInterface
{

    public function getAll(): Collection
    {
        return Film::all();
    }

    public function getById($id): ?Film
    {
        return Film::find($id);
    }

    public function create(array $data): Film
    {
        return Film::create($data);
    }

    public function update($id, array $data): bool
    {
        $film = Film::find($id);
        if ($film) {
            return $film->update($data);
        }
        return false;
    }

    public function delete($id): bool
    {
        $film = Film::find($id);
        if ($film) {
            return $film->delete();
        }
        return false;
    }

    public function orderBy($column, $direction): \Illuminate\Database\Eloquent\Builder
    {
        return Film::orderBy($column, $direction);
    }

}
