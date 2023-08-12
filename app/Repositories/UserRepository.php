<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface
{

    public function getAll(): Collection
    {
        return User::all();
    }

    public function getById($id): ?User
    {
        return User::find($id);
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update($id, array $data): bool
    {
        $user = User::find($id);
        if ($user) {
            return $user->update($data);
        }
        return false;
    }

    public function delete($id): bool
    {
        $user = User::find($id);
        if ($user) {
            return $user->delete();
        }
        return false;
    }

    public function orderBy($column, $direction): \Illuminate\Database\Eloquent\Builder
    {
        return User::orderBy($column, $direction);
    }

    public function whereEmail($email): \Illuminate\Database\Eloquent\Builder
    {
        return User::where('email', $email);
    }

}
