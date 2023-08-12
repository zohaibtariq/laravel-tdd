<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Film;

interface FilmRepositoryInterface
{
    public function getAll(): Collection;
    public function getById($id): ?Film;
    public function create(array $data): Film;
    public function update($id, array $data): bool;
    public function delete($id): bool;
    public function orderBy($column, $direction): \Illuminate\Database\Eloquent\Builder;
}
