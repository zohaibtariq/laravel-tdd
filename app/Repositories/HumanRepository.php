<?php

namespace App\Repositories;

use App\Models\Human;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Interfaces\HumanRepositoryInterface;

class HumanRepository implements HumanRepositoryInterface
{

    public function getAll(): Collection
    {
        return Human::all();
    }

    public function getById($id): ?Human
    {
        return Human::find($id);
    }

    public function create(array $data): Human
    {
        return Human::create($data);
    }

    public function update($id, array $data): bool
    {
        $human = Human::find($id);
        if ($human) {
            return $human->update($data);
        }
        return false;
    }

    public function delete($id): bool
    {
        $human = Human::find($id);
        if ($human) {
            return $human->delete();
        }
        return false;
    }

    public function orderBy($column, $direction): \Illuminate\Database\Eloquent\Builder
    {
        return Human::orderBy($column, $direction);
    }

}
