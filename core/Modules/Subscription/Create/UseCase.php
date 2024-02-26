<?php

namespace Core\Modules\Subscription\Create;

class UseCase
{
    const PLANS = ['plan_start', 'plan_mid', 'plan_advanced'];

    public function execute(Request $request)
    {
        if(!in_array($request->planIdentifier, self::PLANS)){
            throw new \Exception('GENERIC EXCEPTION');
        }

        //CRIA A ASSINATURA

        return true;
    }
}
