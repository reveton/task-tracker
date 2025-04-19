<?php

namespace App\TaskTracker\Domain\Exceptions;

use Ramsey\Uuid\UuidInterface;
use Throwable;

class TaskNotFound extends \Exception
{
    public function __construct(UuidInterface $task_id, int $code = 0, ?Throwable $previous = null)
    {
        $message = "Task with id: ".$task_id." not found";
        parent::__construct($message, $code, $previous);
    }
}