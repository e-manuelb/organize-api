<?php

namespace App\Domains\User\Subdomains\Purchase\Services;

use App\Domains\User\Subdomains\Purchase\Models\Purchase;
use App\Domains\User\Subdomains\Purchase\Repositories\Interfaces\PurchaseRepositoryInterface;
use App\Domains\User\Subdomains\Purchase\Services\Interfaces\PurchaseServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class PurchaseService implements PurchaseServiceInterface
{
    protected PurchaseRepositoryInterface $purchaseRepository;

    public function __construct(PurchaseRepositoryInterface $purchaseRepository)
    {
        $this->purchaseRepository = $purchaseRepository;
    }

    public function create(array $data): Purchase
    {
        return $this->purchaseRepository->create($data);
    }

    public function list(int $user_id): Collection
    {
        return $this->purchaseRepository->list($user_id);
    }

    public function getByID(int $id): Purchase
    {
        return $this->purchaseRepository->getByID($id);
    }

    public function update(array $data, int $id): Purchase
    {
        return $this->purchaseRepository->update($data, $id);
    }

    public function delete(int $id): void
    {
        $this->purchaseRepository->delete($id);
    }
}
