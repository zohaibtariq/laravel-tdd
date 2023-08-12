<?php

namespace App\Repositories;

use App\Models\Episode;
use App\Repositories\Interfaces\EpisodeRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EpisodeRepository implements EpisodeRepositoryInterface
{

    public function getAll(): Collection
    {
        return Episode::all();
    }

    public function getById($id): ?Episode
    {
        return Episode::find($id);
    }

    public function create(array $data): Episode
    {
        return Episode::create($data);
    }

    public function update($id, array $data): bool
    {
        $episode = Episode::find($id);
        if ($episode) {
            return $episode->update($data);
        }
        return false;
    }

    public function delete($id): bool
    {
        $episode = Episode::find($id);
        if ($episode) {
            return $episode->delete();
        }
        return false;
    }

    public function orderBy($column, $direction): \Illuminate\Database\Eloquent\Builder
    {
        return Episode::orderBy($column, $direction);
    }

}
