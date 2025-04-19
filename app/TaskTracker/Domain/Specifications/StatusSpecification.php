<?php

namespace App\TaskTracker\Domain\Specifications;

use App\SharedKernel\Specification\Specification;
use App\TaskTracker\Domain\Aggregates\Task;
use App\TaskTracker\Domain\ValueObjects\TaskStatus;

class StatusSpecification implements Specification
{
    public function __construct(
        protected TaskStatus $status
    ) {}

    public function isSatisfiedBy(mixed $candidate): bool
    {
        return $candidate instanceof Task
            && $candidate->getStatus() == $this->status;
    }
}