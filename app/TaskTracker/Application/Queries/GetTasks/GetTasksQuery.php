<?php

namespace App\TaskTracker\Application\Queries\GetTasks;

use App\TaskTracker\Domain\ValueObjects\TaskStatus;
use Ramsey\Uuid\UuidInterface;

class GetTasksQuery
{
    public function __construct(
        public ?TaskStatus $status,
        public ?UuidInterface $assignId
    ) {}
}