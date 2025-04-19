<?php

namespace App\TaskTracker\Infrastructure\Providers;

use App\TaskTracker\Domain\Repositories\TaskRepository;
use App\TaskTracker\Infrastructure\Persistence\InMemoryTaskRepository;
use Illuminate\Routing\Route;
use Illuminate\Support\ServiceProvider;

class TaskTrackerProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(TaskRepository::class, InMemoryTaskRepository::class);
    }

    public function boot(): void
    {
        $this->registerRoutes();
    }

    protected function registerRoutes(): void
    {
        Route::prefix('api')
            ->group(base_path('app/TaskTracker/Infrastructure/routes/api.php'));
    }
}