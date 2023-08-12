<?php

namespace App\Repositories;

use App\Models\Vehicle;
use App\Repositories\Interfaces\VehicleRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class VehicleRepository implements VehicleRepositoryInterface
{

    public function getAll(): Collection
    {
        return Vehicle::all();
    }

    public function getById($id): ?Vehicle
    {
        return Vehicle::find($id);
    }

    public function create(array $data): Vehicle
    {
        return Vehicle::create($data);
    }

    public function update($id, array $data): bool
    {
        $vehicle = Vehicle::find($id);
        if ($vehicle) {
            return $vehicle->update($data);
        }
        return false;
    }

    public function delete($id): bool
    {
        $vehicle = Vehicle::find($id);
        if ($vehicle) {
            return $vehicle->delete();
        }
        return false;
    }

    public function orderBy($column, $direction): \Illuminate\Database\Eloquent\Builder
    {
        return Vehicle::orderBy($column, $direction);
    }

}
