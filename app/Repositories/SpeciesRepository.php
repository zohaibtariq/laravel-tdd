<?php

namespace App\Repositories;

use App\Models\Species;
use App\Repositories\Interfaces\SpeciesRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SpeciesRepository implements SpeciesRepositoryInterface
{

    public function getAll(): Collection
    {
        return Species::all();
    }

    public function getById($id): ?Species
    {
        return Species::find($id);
    }

    public function create(array $data): Species
    {
        return Species::create($data);
    }

    public function update($id, array $data): bool
    {
        $species = Species::find($id);
        if ($species) {
            return $species->update($data);
        }
        return false;
    }

    public function delete($id): bool
    {
        $species = Species::find($id);
        if ($species) {
            return $species->delete();
        }
        return false;
    }

    public function orderBy($column, $direction): \Illuminate\Database\Eloquent\Builder
    {
        return Species::orderBy($column, $direction);
    }

}
