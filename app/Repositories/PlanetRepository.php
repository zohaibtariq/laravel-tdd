<?php

namespace App\Repositories;

use App\Models\Planet;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Interfaces\PlanetRepositoryInterface;

class PlanetRepository implements PlanetRepositoryInterface
{

    public function getAll(): Collection
    {
        return Planet::all();
    }

    public function getById($id): ?Planet
    {
        return Planet::find($id);
    }

    public function create(array $data): Planet
    {
        return Planet::create($data);
    }

    public function update($id, array $data): bool
    {
        $planet = Planet::find($id);
        if ($planet) {
            return $planet->update($data);
        }
        return false;
    }

    public function delete($id): bool
    {
        $planet = Planet::find($id);
        if ($planet) {
            return $planet->delete();
        }
        return false;
    }

    public function orderBy($column, $direction): \Illuminate\Database\Eloquent\Builder
    {
        return Planet::orderBy($column, $direction);
    }

}
