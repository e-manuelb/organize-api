<?php

namespace App\Domains\User\Subdomains\Wallet\Http\Controllers\Interfaces;

use App\Domains\User\Subdomains\Wallet\Http\Requests\WalletRequest;
use App\Domains\User\Subdomains\Wallet\Http\Resources\WalletResource;

interface CreateWalletControllerInterface
{
    public function __invoke(WalletRequest $request): WalletResource;
}
