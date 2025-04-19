<?php

namespace App\TaskTracker\Infrastructure\Http\Controllers;

use App\SharedKernel\Domain\Interfaces\CommandBusInterface;
use App\SharedKernel\Infrastructure\Helpers\ResponseHelper;
use App\TaskTracker\Application\DTOs\TaskDTO;
use App\TaskTracker\Domain\Aggregates\Task;
use App\TaskTracker\Infrastructure\Http\Requests\GetTasksRequest;
use App\TaskTracker\Infrastructure\Http\Requests\UpdateTaskStatusRequest;
use Illuminate\Routing\Controller;

class TaskTrackerController extends Controller
{
    public function __construct(
        protected CommandBusInterface $commandBus
    ) {}

    public function index(GetTasksRequest $request) {
        try {
            $query = $request->toQuery();
            $tasks = $this->commandBus->dispatch($query);

            $dtos = array_map(fn(Task $task) => TaskDTO::fromEntity($task)->toArray(), $tasks);

            return ResponseHelper::success($dtos);
        }
        catch (\Exception $e) {
            return ResponseHelper::error($e->getMessage());
        }
    }

    public function updateStatus(UpdateTaskStatusRequest $request) {
        try {
            $command = $request->toCommand();

            $this->commandBus->dispatch($command);

            return ResponseHelper::success();
        }
        catch (\Exception $e) {
            return ResponseHelper::error($e->getMessage());
        }
    }

    public function assignToUser(UpdateTaskStatusRequest $request) {
        try {
            $command = $request->toCommand();

            $this->commandBus->dispatch($command);

            return ResponseHelper::success();
        }
        catch (\Exception $e) {
            return ResponseHelper::error($e->getMessage());
        }
    }
}