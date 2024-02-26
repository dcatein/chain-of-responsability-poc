<?php

namespace Core\Modules\Subscription\Create;

class Request
{
    public function __construct(
        public readonly int $clientId,
        public readonly string $planIdentifier,
    ){
    }
}
