<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;


abstract class BaseRepository implements RepositoryInterface
{
    public function __construct(protected Model $model)
    {
    }

    public function list(): LengthAwarePaginator
    {
        $newQuery = $this->model->query();
        return $newQuery->paginate(env('PAGINATION_LIMIT', 15));
    }

    public function find(int $id): ?Model
    {
        return $this->model->query()->find($id);
    }

    public function create(array $data): Model
    {
        return $this->model->query()->create($data);
    }

    public function update(Model $model, array $data): bool
    {
        return $model->update($data);
    }

    public function delete(Model $model): bool
    {
        return $model->delete();
    }
}
