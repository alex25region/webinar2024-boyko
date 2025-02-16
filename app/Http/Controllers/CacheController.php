<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Project;
use App\Services\Cache\CacheInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

final class CacheController extends Controller
{
    public function __construct(private readonly CacheInterface $cache)
    {
    }

    public function __invoke()
    {
        $project = Project::query()->find(10);
        if ($this->cache->has('project')) {
            Log::info('Кэш существует');
            return response()->json(['project' => $this->cache->get('project')]);
        }
        $this->cache->set('project', $project->name, 60);
        Log::info('Добавили в кэш');
        return response()->json(['project' => $this->cache->get('project')]);
    }
}
