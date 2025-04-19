<?php

namespace App\TaskTracker\Application\Commands\UpdateTaskStatus;

use App\TaskTracker\Domain\Repositories\TaskRepository;

class UpdateTaskStatusHandler
{
    public function __construct(
        protected TaskRepository $taskRepository
    ) {}

    public function handle(UpdateTaskStatusCommand $command) {
        $task = $this->taskRepository->findById($command->task_id);

        $task->updateStatus($command->status);

        $this->taskRepository->save($task);
    }
}