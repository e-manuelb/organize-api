<?php

namespace App\Domains\User\Subdomains\Purchase\Repositories;

use App\Domains\User\Subdomains\Purchase\Models\Purchase;
use App\Domains\User\Subdomains\Purchase\Repositories\Interfaces\DeletePurchaseRepositoryInterface;

class DeletePurchaseRepository implements DeletePurchaseRepositoryInterface
{
    protected Purchase $purchase;

    public function __construct(Purchase $purchase)
    {
        $this->purchase = $purchase;
    }

    public function delete(int $id): void
    {
        $this->purchase->findOrFail($id)->delete();
    }
}
