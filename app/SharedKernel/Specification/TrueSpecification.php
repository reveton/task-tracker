<?php

namespace App\SharedKernel\Specification;

class TrueSpecification implements Specification
{

    public function isSatisfiedBy(mixed $candidate): bool
    {
        return true;
    }
}