<?php

namespace App\Http\Controllers\User\Wallet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Wallet\WalletRequest;
use App\Http\Resources\Wallet\WalletResource;
use App\Models\Wallet;

class CreateWalletController extends Controller
{
    public function __invoke(WalletRequest $request): WalletResource
    {
        $wallet = Wallet::create($request->all());

        return new WalletResource($wallet);
    }

}
