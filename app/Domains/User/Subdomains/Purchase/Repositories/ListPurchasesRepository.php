<?php

namespace App\Domains\User\Subdomains\Purchase\Repositories;

use App\Domains\User\Subdomains\Purchase\Models\Purchase;
use App\Domains\User\Subdomains\Purchase\Repositories\Interfaces\ListPurchasesRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ListPurchasesRepository implements ListPurchasesRepositoryInterface
{
    protected Purchase $purchase;

    public function __construct(Purchase $purchase)
    {
        $this->purchase = $purchase;
    }

    public function list(int $id): Collection
    {
        return $this->purchase->where('user_id', '=', $id)->get();
    }
}
