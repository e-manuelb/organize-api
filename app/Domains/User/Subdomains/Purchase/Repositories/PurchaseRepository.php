<?php

namespace App\Domains\User\Subdomains\Purchase\Repositories;

use App\Domains\User\Subdomains\Purchase\Models\Purchase;
use App\Domains\User\Subdomains\Purchase\Repositories\Interfaces\PurchaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PurchaseRepository implements PurchaseRepositoryInterface
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

    public function list(int $user_id): Collection
    {
        return $this->purchase->where('user_id', '=', $user_id)->get();
    }

    public function getByID(int $id): Purchase
    {
        return $this->purchase->findOrFail($id);
    }

    public function update(array $data, int $id): Purchase
    {
        $purchase = $this->purchase->findOrFail($id);

        $purchase->update($data);

        return $purchase;
    }

    public function delete(int $id): void
    {
        $this->purchase->findOrFail($id)->delete();
    }
}
