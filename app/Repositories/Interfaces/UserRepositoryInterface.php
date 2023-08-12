<?php

namespace App\Repositories\Interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function getAll(): Collection;
    public function getById($id): ?User;
    public function create(array $data): User;
    public function update($id, array $data): bool;
    public function delete($id): bool;
    public function orderBy($column, $direction): \Illuminate\Database\Eloquent\Builder;
    public function whereEmail($email): \Illuminate\Database\Eloquent\Builder;
}
