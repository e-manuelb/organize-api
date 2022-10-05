<?php

namespace App\Domains\User\Subdomains\Wallet\Http\Controllers;

use App\Domains\User\Subdomains\Wallet\Http\Controllers\Interfaces\WalletControllerInterface;
use App\Domains\User\Subdomains\Wallet\Http\Requests\WalletRequest;
use App\Domains\User\Subdomains\Wallet\Http\Resources\WalletResource;
use App\Domains\User\Subdomains\Wallet\Models\Wallet;
use App\Domains\User\Subdomains\Wallet\Services\WalletService;
use App\Http\Controllers\Controller;

class WalletController extends Controller implements WalletControllerInterface
{
    protected WalletService $walletService;

    public function __construct(WalletService $walletService)
    {
        $this->walletService = $walletService;
    }

    public function __invoke(WalletRequest $request): WalletResource
    {
        return new WalletResource($this->walletService->create($request->all()));
    }

}
