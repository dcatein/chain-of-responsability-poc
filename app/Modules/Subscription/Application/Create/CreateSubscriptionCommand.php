<?php

namespace App\Modules\Subscription\Application\Create;

class CreateSubscriptionCommand
{
    public function __construct(
        private readonly string $customerId,
        private readonly string $planId,
        private readonly array $apps
    ) {
    }

    public function getCustomerId(): string
    {
        return $this->customerId;
    }

    public function getPlanId(): string
    {
        return $this->planId;
    }

    public function getApps(): array
    {
        return $this->apps;
    }

}
