<?php

namespace App\Domains\User\Subdomains\Wallet\Repositories\Interfaces;

use App\Domains\User\Subdomains\Wallet\Models\Wallet;

interface CreateWalletRepositoryInterface
{
    public function create(array $data): Wallet;
}
