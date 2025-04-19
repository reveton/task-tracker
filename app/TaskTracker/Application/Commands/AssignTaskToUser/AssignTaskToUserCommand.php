<?php

namespace App\TaskTracker\Application\Commands\AssignTaskToUser;

use Ramsey\Uuid\UuidInterface;

class AssignTaskToUserCommand
{
    public function __construct(
        public UuidInterface $task_id,
        public UuidInterface $user_id
    ) {}
}