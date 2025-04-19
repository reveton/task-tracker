<?php

namespace App\TaskTracker\Infrastructure\Persistence;

use App\SharedKernel\Specification\Specification;
use App\TaskTracker\Domain\Aggregates\Task;
use App\TaskTracker\Domain\Exceptions\TaskNotFound;
use App\TaskTracker\Domain\Repositories\TaskRepository;
use Ramsey\Uuid\UuidInterface;

class InMemoryTaskRepository implements TaskRepository
{

    private array $tasks = [];

    /**
     * @throws TaskNotFound
     */
    public function findById(UuidInterface $uuid): Task
    {
        /** @var Task $task */
        foreach ($this->tasks as $task) {
           if ($task->getId()->equals($uuid))
               return $task;
       }
        throw new TaskNotFound($uuid);
    }

    public function save(Task $task) : void
    {
        $this->tasks[(string)$task->getId()] = $task;
    }

    public function findBySpec(Specification $specification): array
    {
        return array_values(array_filter($this->tasks, fn(Task $task) =>
            $specification->isSatisfiedBy($task)
        ));
    }
}