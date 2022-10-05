<?php

namespace App\Domains\User\Subdomains\Wallet\Repositories;

use App\Domains\User\Subdomains\Wallet\Models\Wallet;
use App\Domains\User\Subdomains\Wallet\Repositories\Interfaces\WalletRepositoryInterface;

class WalletRepository implements WalletRepositoryInterface
{
    protected Wallet $wallet;

    public function __construct(Wallet $wallet)
    {
        $this->wallet = $wallet;
    }

    public function create(array $data): Wallet
    {
        return $this->wallet->create($data);
    }
}
