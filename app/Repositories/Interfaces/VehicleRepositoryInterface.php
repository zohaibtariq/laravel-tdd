<?php

namespace App\Repositories\Interfaces;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Collection;

interface VehicleRepositoryInterface
{
    public function getAll(): Collection;
    public function getById($id): ?Vehicle;
    public function create(array $data): Vehicle;
    public function update($id, array $data): bool;
    public function delete($id): bool;
    public function orderBy($column, $direction): \Illuminate\Database\Eloquent\Builder;
}
