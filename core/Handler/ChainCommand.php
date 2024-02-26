<?php

namespace Core\Handler;

class ChainCommand
{
    public function __construct(
        public readonly int $clientId,
        public readonly string $planIdentifier,
    ){
    }
}
