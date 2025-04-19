<?php

namespace App\SharedKernel\Specification;

interface Specification
{
    public function isSatisfiedBy(mixed $candidate): bool;
}