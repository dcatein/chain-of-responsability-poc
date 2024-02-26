<?php

namespace Core\Handler;

abstract class AbstractHandler
{

    private $next;

    public function setNext(AbstractHandler $handler): AbstractHandler
    {
        $this->next = $handler;

        return $handler;
    }

    public function handle(string $request): ?string
    {
        if ($this->next) {
            return $this->next->handle($request);
        }

        return null;
    }
}
