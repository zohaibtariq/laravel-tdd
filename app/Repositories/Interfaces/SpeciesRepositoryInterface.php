<?php

namespace App\Repositories\Interfaces;

use App\Models\Species;
use Illuminate\Database\Eloquent\Collection;

interface SpeciesRepositoryInterface
{
    public function getAll(): Collection;
    public function getById($id): ? Species;
    public function create(array $data): Species;
    public function update($id, array $data): bool;
    public function delete($id): bool;
    public function orderBy($column, $direction): \Illuminate\Database\Eloquent\Builder;
}
