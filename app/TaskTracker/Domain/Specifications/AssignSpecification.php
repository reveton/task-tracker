<?php

namespace App\TaskTracker\Domain\Specifications;

use App\SharedKernel\Specification\Specification;
use App\TaskTracker\Domain\Aggregates\Task;
use Ramsey\Uuid\UuidInterface;

class AssignSpecification implements Specification
{
    public function __construct(
        protected UuidInterface $assigneeId
    ) {}

    public function isSatisfiedBy(mixed $candidate): bool
    {
        return $candidate instanceof Task
            && $candidate->getAssigneeId()?->equals($this->assigneeId);
    }
}