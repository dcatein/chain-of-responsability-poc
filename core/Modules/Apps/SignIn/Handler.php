<?php

namespace Core\Modules\Apps\SignIn;

use Core\Handler\AbstractHandler;
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
        $useCase->execute();

        $this->next?->handle($command);

    }


}
