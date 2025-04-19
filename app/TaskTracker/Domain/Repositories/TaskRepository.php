<?php

namespace App\TaskTracker\Domain\Repositories;

use App\SharedKernel\Specification\Specification;
use App\TaskTracker\Domain\Aggregates\Task;
use App\TaskTracker\Domain\ValueObjects\TaskStatus;
use Ramsey\Uuid\UuidInterface;

interface TaskRepository
{
    public function findBySpec(Specification $specification) : array;
    public function findById(UuidInterface $uuid) : Task;
    public function save(Task $task) : void;
}