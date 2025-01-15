<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface RepositoryInterface
{
    public function list(): LengthAwarePaginator;
    public function find(int $id): ?Model;
    public function create(array $data): Model;
    public function update(Model $model, array $data): bool;
    public function delete(Model $model): bool;
}
