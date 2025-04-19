<?php

namespace App\SharedKernel\Domain\Aggregates;

use App\SharedKernel\Domain\Exceptions\HandlerNotFound;
use App\SharedKernel\Domain\Interfaces\CommandBusInterface;

class CommandBus implements CommandBusInterface
{
    protected array $handlers = [];

    public function registerHandler(string $commandClass, $handler): void
    {
        $this->handlers[$commandClass] = $handler;
    }

    public function dispatch($command)
    {
        $commandClass = get_class($command);

        if (!isset($this->handlers[$commandClass])) {
            throw new HandlerNotFound($commandClass);
        }

        $handler = $this->handlers[$commandClass];
        return $handler->handle($command);
    }
}