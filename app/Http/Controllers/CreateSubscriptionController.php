<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Core\Modules\Subscription\Create\UseCase as SubscriptionCreateUseCase;
use Core\Modules\Apps\SignIn\UseCase as AppSingInUseCase;
use Core\Modules\Permissions\Associate\UseCase as PermissionsAssociateUseCase;
use Core\Modules\Subscription\Create\Request as UseCaseRequest;
class CreateSubscriptionController
{
    public function __construct()
    {
    }

    public function __invoke(Request $request)
    {
        try {
            $subscriptionCreateUseCase = new SubscriptionCreateUseCase();
            $appSignInUseCase = new AppSingInUseCase();
            $permissionAssociateUseCase = new PermissionsAssociateUseCase();

            $subscriptionCreateUseCase->execute(new UseCaseRequest(
                clientId: $request->get('clientId'),
                planIdentifier: $request->get('planIdentifier')
            ));
            $appSignInUseCase->execute();
            $permissionAssociateUseCase->execute();

            return new JsonResponse();
        }catch (\Throwable $th){
            return new JsonResponse(data: $th->getMessage(), status: 500);
        }
    }
}
