<?php

namespace App\SharedKernel\Specification;

class AndSpecification implements Specification
{
    private Specification $left;
    private Specification $right;

    public function __construct(Specification $left, Specification $right)
    {
        $this->left = $left;
        $this->right = $right;
    }

    public function isSatisfiedBy(mixed $candidate): bool
    {
        return $this->left->isSatisfiedBy($candidate) && $this->right->isSatisfiedBy($candidate);
    }
}