<?php

namespace App\TaskTracker\Domain\ValueObjects;

use InvalidArgumentException;

class TaskDescription
{
    protected string $value;

    public function __construct(
        string $value
    ){
        if (trim($value) === '') {
            throw new InvalidArgumentException('Description cannot be empty');
        }

        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}