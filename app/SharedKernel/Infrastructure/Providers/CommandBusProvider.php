<?php

namespace App\SharedKernel\Infrastructure\Providers;

use App\SharedKernel\Domain\Aggregates\CommandBus;
use App\SharedKernel\Domain\Interfaces\CommandBusInterface;
use App\TaskTracker\Application\Commands\AssignTaskToUser\AssignTaskToUserCommand;
use App\TaskTracker\Application\Commands\AssignTaskToUser\AssignTaskToUserHandler;
use App\TaskTracker\Application\Commands\UpdateTaskStatus\UpdateTaskStatusCommand;
use App\TaskTracker\Application\Commands\UpdateTaskStatus\UpdateTaskStatusHandler;
use App\TaskTracker\Application\Queries\GetTasks\GetTasksHandler;
use App\TaskTracker\Application\Queries\GetTasks\GetTasksQuery;
use Illuminate\Support\ServiceProvider;


class CommandBusProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(CommandBusInterface::class, function ($app) {
            $commandBus = new CommandBus();

            $commandBus->registerHandler(GetTasksQuery::class, $app->make(GetTasksHandler::class));
            $commandBus->registerHandler(UpdateTaskStatusCommand::class, $app->make(UpdateTaskStatusHandler::class));
            $commandBus->registerHandler(AssignTaskToUserCommand::class, $app->make(AssignTaskToUserHandler::class));
        });
    }
}