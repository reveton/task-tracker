<?php

namespace App\TaskTracker\Application\Commands\UpdateTaskStatus;

use App\TaskTracker\Domain\ValueObjects\TaskStatus;
use Ramsey\Uuid\UuidInterface;

class UpdateTaskStatusCommand
{
    public function __construct(
        public UuidInterface $task_id,
        public TaskStatus $status
    ) {}
}