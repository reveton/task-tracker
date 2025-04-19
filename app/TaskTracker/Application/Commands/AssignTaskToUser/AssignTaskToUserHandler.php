<?php

namespace App\TaskTracker\Application\Commands\AssignTaskToUser;

use App\TaskTracker\Domain\Repositories\TaskRepository;

class AssignTaskToUserHandler
{
    public function __construct(
        protected TaskRepository $taskRepository
    ) {}

    public function handle(AssignTaskToUserCommand $command) {
        $task = $this->taskRepository->findById($command->task_id);

        $task->assignUser($command->user_id);

        $this->taskRepository->save($task);
    }
}