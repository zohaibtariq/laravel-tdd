<?php

namespace App\Repositories\Interfaces;

use App\Models\Episode;
use Illuminate\Database\Eloquent\Collection;

interface EpisodeRepositoryInterface
{
    public function getAll(): Collection;
    public function getById($id): ?Episode;
    public function create(array $data): Episode;
    public function update($id, array $data): bool;
    public function delete($id): bool;
    public function orderBy($column, $direction): \Illuminate\Database\Eloquent\Builder;
}
