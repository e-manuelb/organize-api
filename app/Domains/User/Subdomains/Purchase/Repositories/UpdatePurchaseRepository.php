<?php

namespace App\Domains\User\Subdomains\Purchase\Repositories;

use App\Domains\User\Subdomains\Purchase\Models\Purchase;
use App\Domains\User\Subdomains\Purchase\Repositories\Interfaces\UpdatePurchaseRepositoryInterface;

class UpdatePurchaseRepository implements UpdatePurchaseRepositoryInterface
{
    protected Purchase $purchase;

    public function __construct(Purchase $purchase)
    {
        $this->purchase = $purchase;
    }

    public function update(array $data, int $id): Purchase
    {
        $purchase = $this->purchase->findOrFail($id);

        $purchase->update($data);

        return $purchase;
    }
}
