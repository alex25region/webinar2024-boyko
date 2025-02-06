<?php

namespace App\Repository\Project;

use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

final class ProjectRepository extends BaseRepository implements ProjectRepositoryInterface
{
    public function list(bool $api = false): LengthAwarePaginator
    {
        $newQuery = $this->model->query();
        if ($api) {
            return $newQuery->select('id', 'name', 'description', 'image', 'created_at')->paginate(env('PAGINATION_LIMIT'));
        }
        return $newQuery->with('user')->paginate(env('PAGINATION_LIMIT'));
    }
}
