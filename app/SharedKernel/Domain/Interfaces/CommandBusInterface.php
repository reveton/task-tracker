<?php

namespace App\SharedKernel\Domain\Interfaces;



interface CommandBusInterface
{
    public function dispatch($command);
    public function registerHandler(string $commandClass, $handler): void;
}