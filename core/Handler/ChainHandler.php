<?php

namespace Core\Handler;

interface ChainHandler
{
    public function setNext(ChainHandler $next);

    public function handle(ChainCommand $command);
}
