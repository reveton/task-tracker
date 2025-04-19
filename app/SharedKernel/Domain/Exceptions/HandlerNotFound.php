<?php

namespace App\SharedKernel\Domain\Exceptions;

use Throwable;

class HandlerNotFound extends \Exception
{
    public function __construct(string $handler = "", int $code = 0, ?Throwable $previous = null)
    {
        $message = "Handler not found for command: ".$handler;
        parent::__construct($message, $code, $previous);
    }
}