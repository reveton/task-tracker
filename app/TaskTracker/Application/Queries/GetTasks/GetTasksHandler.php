<?php

namespace App\TaskTracker\Application\Queries\GetTasks;

use App\SharedKernel\Specification\SpecificationBuilder;
use App\TaskTracker\Domain\Repositories\TaskRepository;
use App\TaskTracker\Domain\Specifications\AssignSpecification;
use App\TaskTracker\Domain\Specifications\StatusSpecification;

class GetTasksHandler
{
    public function __construct(
        protected TaskRepository $taskRepository
    ) {}

    public function handle(GetTasksQuery $query) {

        $builder = new SpecificationBuilder();

        if ($query->status)
            $builder->where(new StatusSpecification($query->status));

        if ($query->assignId)
            $builder->where(new AssignSpecification($query->assignId));

        $spec = $builder->build();

        return $this->taskRepository->findBySpec($spec);
    }
}