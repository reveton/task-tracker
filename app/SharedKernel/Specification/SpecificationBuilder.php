<?php

namespace App\SharedKernel\Specification;


class SpecificationBuilder
{
    private ?Specification $specification = null;

    public function where(Specification $spec): self
    {
        if ($this->specification === null) {
            $this->specification = $spec;
        } else {
            $this->specification = new AndSpecification($this->specification, $spec);
        }

        return $this;
    }

    public function orWhere(Specification $spec): self
    {
        if ($this->specification === null) {
            $this->specification = $spec;
        } else {
            $this->specification = new OrSpecification($this->specification, $spec);
        }

        return $this;
    }

    public function build(): Specification
    {
        return $this->specification ?? new TrueSpecification();
    }
}