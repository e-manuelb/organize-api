<?php

namespace App\Domains\User\Subdomains\Purchase\Services;

use App\Domains\User\Subdomains\Purchase\Repositories\Interfaces\DeletePurchaseRepositoryInterface;
use App\Domains\User\Subdomains\Purchase\Services\Interfaces\DeletePurchaseServiceInterface;

class DeletePurchaseService implements DeletePurchaseServiceInterface
{
    protected DeletePurchaseRepositoryInterface $deletePurchaseRepository;

    public function __construct(DeletePurchaseRepositoryInterface $deletePurchaseRepository)
    {
        $this->deletePurchaseRepository = $deletePurchaseRepository;
    }

    public function handle(int $id): void
    {
        $this->deletePurchaseRepository->delete($id);
    }
}
