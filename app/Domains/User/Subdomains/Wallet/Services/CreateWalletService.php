<?php

namespace App\Domains\User\Subdomains\Wallet\Services;

use App\Domains\User\Subdomains\Wallet\Models\Wallet;
use App\Domains\User\Subdomains\Wallet\Repositories\Interfaces\CreateWalletRepositoryInterface;
use App\Domains\User\Subdomains\Wallet\Services\Interfaces\CreateWalletServiceInterface;

class CreateWalletService implements CreateWalletServiceInterface
{
    protected CreateWalletRepositoryInterface $createWalletRepository;

    public function __construct(CreateWalletRepositoryInterface $createWalletRepository)
    {
        $this->createWalletRepository = $createWalletRepository;
    }

    public function handle(array $data): Wallet
    {
        return $this->createWalletRepository->create($data);
    }
}
