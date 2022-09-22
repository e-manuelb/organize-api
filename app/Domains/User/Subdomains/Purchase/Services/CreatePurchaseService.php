<?php

namespace App\Domains\User\Subdomains\Purchase\Services;

use App\Domains\User\Subdomains\Purchase\Models\Purchase;
use App\Domains\User\Subdomains\Purchase\Repositories\Interfaces\CreatePurchaseRepositoryInterface;
use App\Domains\User\Subdomains\Purchase\Services\Interfaces\CreatePurchaseServiceInterface;

class CreatePurchaseService implements CreatePurchaseServiceInterface
{
    protected CreatePurchaseRepositoryInterface $createPurchaseRepository;

    public function __construct(CreatePurchaseRepositoryInterface $createPurchaseRepository)
    {
        $this->createPurchaseRepository = $createPurchaseRepository;
    }

    public function handle(array $data): Purchase
    {
        return $this->createPurchaseRepository->create($data);
    }
}
