<?php

namespace Core\Handler;

use Core\Modules\Subscription\Create\Request as UseCaseRequest;
use Core\Modules\Subscription\Create\UseCase as SubscriptionCreateUseCase;
use Core\Modules\Apps\SignIn\UseCase as AppSingInUseCase;
use Core\Modules\Permissions\Associate\UseCase as PermissionsAssociateUseCase;

class OutroSubscriptionHandler
{
    public function __invoke(ChainCommand $command)
    {
        $subscriptionCreateUseCase = new SubscriptionCreateUseCase();
        $appSignInUseCase = new AppSingInUseCase();
        $permissionAssociateUseCase = new PermissionsAssociateUseCase();

        $subscriptionCreateUseCase->execute(new UseCaseRequest(
            clientId: $command->clientId,
            planIdentifier: $command->planIdentifier
        ));
        $appSignInUseCase->execute();
        $permissionAssociateUseCase->execute();
    }
}
