<?php

namespace App\Repositories\Interfaces;

use App\Models\Starship;
use Illuminate\Database\Eloquent\Collection;

interface StarshipRepositoryInterface
{
    public function getAll(): Collection;
    public function getById($id): ?Starship;
    public function create(array $data): Starship;
    public function update($id, array $data): bool;
    public function delete($id): bool;
    public function orderBy($column, $direction): \Illuminate\Database\Eloquent\Builder;
}
