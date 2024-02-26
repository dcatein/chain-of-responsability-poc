<?php

namespace App\Http\Controllers;

use Core\Handler\ChainCommand;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Core\Modules\Subscription\Create\Handler as SubscriptionCreateHandler;
use Core\Modules\Apps\SignIn\Handler as AppsSignInHandler;
use Core\Modules\Permissions\Associate\Handler as PermissionsAssociateHandler;
class CreateSubscriptionChainController
{

    public function __invoke(Request $request)
    {
        try {
            $subscriptionHandler = new SubscriptionCreateHandler();
            $appSingInHandler = new AppsSignInHandler();
            $permissionsHandler = new PermissionsAssociateHandler();

            $subscriptionHandler->setNext($appSingInHandler);
            $subscriptionHandler->setNext($permissionsHandler);

            $subscriptionHandler->handle(
                new ChainCommand(
                    clientId: $request->get('clientId'),
                    planIdentifier: $request->get('planIdentifier')
                ));

            return new JsonResponse();
        }catch (\Exception $exception){
            return new JsonResponse(
                $exception->getMessage(),
                500
            );
        }
    }
}
