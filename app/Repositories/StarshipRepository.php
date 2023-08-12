<?php

namespace App\Repositories;

use App\Models\Starship;
use App\Repositories\Interfaces\StarshipRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class StarshipRepository implements StarshipRepositoryInterface
{

    public function getAll(): Collection
    {
        return Starship::all();
    }

    public function getById($id): ?Starship
    {
        return Starship::find($id);
    }

    public function create(array $data): Starship
    {
        return Starship::create($data);
    }

    public function update($id, array $data): bool
    {
        $starship = Starship::find($id);
        if ($starship) {
            return $starship->update($data);
        }
        return false;
    }

    public function delete($id): bool
    {
        $starship = Starship::find($id);
        if ($starship) {
            return $starship->delete();
        }
        return false;
    }

    public function orderBy($column, $direction): \Illuminate\Database\Eloquent\Builder
    {
        return Starship::orderBy($column, $direction);
    }

}
