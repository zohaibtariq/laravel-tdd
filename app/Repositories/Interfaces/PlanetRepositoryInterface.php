<?php

namespace App\Repositories\Interfaces;

use App\Models\Planet;
use Illuminate\Database\Eloquent\Collection;

interface PlanetRepositoryInterface
{
    public function getAll(): Collection;
    public function getById($id): ?Planet;
    public function create(array $data): Planet;
    public function update($id, array $data): bool;
    public function delete($id): bool;
    public function orderBy($column, $direction): \Illuminate\Database\Eloquent\Builder;
}
