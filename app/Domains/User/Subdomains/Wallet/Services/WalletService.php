<?php

namespace App\Domains\User\Subdomains\Wallet\Services;

use App\Domains\User\Subdomains\Wallet\Models\Wallet;
use App\Domains\User\Subdomains\Wallet\Repositories\Interfaces\WalletRepositoryInterface;
use App\Domains\User\Subdomains\Wallet\Services\Interfaces\WalletServiceInterface;

class WalletService implements WalletServiceInterface
{
    protected WalletRepositoryInterface $walletRepository;

    public function __construct(WalletRepositoryInterface $walletRepository)
    {
        $this->walletRepository = $walletRepository;
    }

    public function create(array $data): Wallet
    {
        return $this->walletRepository->create($data);
    }
}
