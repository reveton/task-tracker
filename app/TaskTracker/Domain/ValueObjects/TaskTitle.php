<?php

namespace App\TaskTracker\Domain\ValueObjects;

use InvalidArgumentException;

class TaskTitle
{
    protected string $value;

    public function __construct(
        string $value
    ){
        if (trim($value) === '') {
            throw new InvalidArgumentException('Title cannot be empty');
        }

        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}