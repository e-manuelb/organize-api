<?php

namespace App\Domains\User\Subdomains\Wallet\Services\Interfaces;

use App\Domains\User\Subdomains\Wallet\Models\Wallet;

interface WalletServiceInterface
{
    public function create(array $data): Wallet;
}
