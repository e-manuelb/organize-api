<?php

namespace App\Domains\User\Subdomains\Purchase\Repositories;

use App\Domains\User\Subdomains\Purchase\Models\Purchase;
use App\Domains\User\Subdomains\Purchase\Repositories\Interfaces\CreatePurchaseRepositoryInterface;

class CreatePurchaseRepository implements CreatePurchaseRepositoryInterface
{
    protected Purchase $purchase;

    public function __construct(Purchase $purchase)
    {
        $this->purchase = $purchase;
    }

    public function create(array $data): Purchase
    {
        return $this->purchase->create($data);
    }
}
