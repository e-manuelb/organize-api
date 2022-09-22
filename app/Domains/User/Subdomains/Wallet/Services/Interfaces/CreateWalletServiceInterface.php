<?php

namespace App\Domains\User\Subdomains\Wallet\Services\Interfaces;

use App\Domains\User\Subdomains\Wallet\Models\Wallet;

interface CreateWalletServiceInterface
{
    public function handle(array $data): Wallet;
}
