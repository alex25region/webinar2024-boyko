<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Goal;
use App\Models\Project;
use App\Models\Step;
use App\Models\User;
use App\Repository\Goal\GoalRepository;
use App\Repository\Goal\GoalRepositoryInterface;
use App\Repository\Project\ProjectRepository;
use App\Repository\Project\ProjectRepositoryInterface;
use App\Repository\Step\StepRepository;
use App\Repository\Step\StepRepositoryInterface;
use App\Repository\User\UserRepository;
use App\Repository\User\UserRepositoryInterface;
use App\Services\Cache\CacheInterface;
use App\Services\Cache\CacheService;
use App\Services\FileUpload\FileUploadInterface;
use App\Services\FileUpload\FileUplodService;
use App\Services\SocialUserInterface;
use App\Services\SocialUserService;
use Illuminate\Contracts\Auth\Factory as AuthFactory;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(UserRepositoryInterface::class, fn() => new UserRepository($this->app->make(User::class)));
        $this->app->singleton(ProjectRepositoryInterface::class, fn() => new ProjectRepository($this->app->make(Project::class)));
        $this->app->singleton(GoalRepositoryInterface::class, fn() => new GoalRepository($this->app->make(Goal::class)));
        $this->app->singleton(StepRepositoryInterface::class, fn() => new StepRepository($this->app->make(Step::class)));

        $this->app->bind(SocialUserInterface::class, fn() => new SocialUserService($this->app->make(AuthFactory::class)));
        $this->app->bind(CacheInterface::class, fn() => new CacheService($this->app->make('cache'), config('cache.default')));

        $this->app->bind(FileUploadInterface::class, fn() => new FileUplodService());
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        JsonResource::withoutWrapping();
    }
}
