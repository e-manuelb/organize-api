<?php

namespace App\Domains\User\Subdomains\Wallet\Http\Controllers;

use App\Domains\User\Subdomains\Wallet\Http\Controllers\Interfaces\CreateWalletInterface;
use App\Domains\User\Subdomains\Wallet\Http\Requests\WalletRequest;
use App\Domains\User\Subdomains\Wallet\Http\Resources\WalletResource;
use App\Domains\User\Subdomains\Wallet\Models\Wallet;
use App\Http\Controllers\Controller;

class CreateWalletController extends Controller implements CreateWalletInterface
{
    public function __invoke(WalletRequest $request): WalletResource
    {
        $wallet = Wallet::create($request->all());

        return new WalletResource($wallet);
    }

}
