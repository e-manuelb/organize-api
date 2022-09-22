<?php

namespace App\Domains\User\Subdomains\Purchase\Services;

use App\Domains\User\Subdomains\Purchase\Models\Purchase;
use App\Domains\User\Subdomains\Purchase\Repositories\Interfaces\UpdatePurchaseRepositoryInterface;
use App\Domains\User\Subdomains\Purchase\Services\Interfaces\UpdatePurchaseServiceInterface;

class UpdatePurchaseService implements UpdatePurchaseServiceInterface
{
    protected UpdatePurchaseRepositoryInterface $updatePurchaseRepository;

    public function __construct(UpdatePurchaseRepositoryInterface $updatePurchaseRepository)
    {
        $this->updatePurchaseRepository = $updatePurchaseRepository;
    }

    public function handle(array $data, int $id): Purchase
    {
        return $this->updatePurchaseRepository->update($data, $id);
    }
}
