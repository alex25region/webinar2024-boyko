<?php

declare(strict_types=1);

namespace App\Providers;

use App\Events\CreatedGoal;
use App\Listeners\SendEmailListener;
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
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Event;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

//        Event::listen([
//            CreatedGoal::class => [SendEmailListener::class]
//        ]);
    }
}
