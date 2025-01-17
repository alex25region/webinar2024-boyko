<?php

namespace App\Repository\Project;

use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

final class ProjectRepository extends BaseRepository implements ProjectRepositoryInterface
{
    public function __construct(protected Model $model)
    {
    }

    public function list(): LengthAwarePaginator
    {
        $newQuery = $this->model->query();
        return $newQuery->with('user')->paginate(env('PAGINATION_LIMIT'));
    }
}
