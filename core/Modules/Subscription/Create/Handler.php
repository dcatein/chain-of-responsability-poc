<?php

namespace Core\Modules\Subscription\Create;

use Core\Handler\ChainCommand;
use Core\Handler\ChainHandler;

class Handler implements ChainHandler
{
    private $next;
    public function setNext(ChainHandler $next): void
    {
        $this->next = $next;
    }
    public function handle(ChainCommand $command)
    {

        $useCase = new UseCase();
        $response = $useCase->execute(
            new Request(
                clientId: $command->clientId,
                planIdentifier: $command->planIdentifier
            )
        );

        $this->next->handle($command);
    }

}
