<?php

namespace App\TaskTracker\Domain\ValueObjects;

enum TaskStatus: string
{
    case TODO = 'todo';
    case IN_PROGRESS = 'in_progress';
    case DONE = 'done';

    public function isTodo(): bool
    {
        return $this === self::TODO;
    }

    public function isInProgress(): bool
    {
        return $this === self::IN_PROGRESS;
    }

    public function isDone(): bool
    {
        return $this === self::DONE;
    }
}