<?php

namespace App\Http\Controllers;

use Core\Handler\OutroSubscriptionHandler;
use Illuminate\Http\JsonResponse;

class CreateSubscriptionHandlerController
{
    public function __invoke()
    {
        $response = (new OutroSubscriptionHandler());

        return new JsonResponse(
            $response
        );
    }
}
