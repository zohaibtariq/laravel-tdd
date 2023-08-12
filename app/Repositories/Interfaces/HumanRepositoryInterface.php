<?php

namespace App\Repositories\Interfaces;

use App\Models\Human;
use Illuminate\Database\Eloquent\Collection;

interface HumanRepositoryInterface
{
    public function getAll(): Collection;
    public function getById($id): ?Human;
    public function create(array $data): Human;
    public function update($id, array $data): bool;
    public function delete($id): bool;
    public function orderBy($column, $direction): \Illuminate\Database\Eloquent\Builder;
}
