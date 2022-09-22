<?php

namespace App\Domains\User\Subdomains\Wallet\Http\Controllers;

use App\Domains\User\Subdomains\Wallet\Http\Controllers\Interfaces\CreateWalletControllerInterface;
use App\Domains\User\Subdomains\Wallet\Http\Requests\WalletRequest;
use App\Domains\User\Subdomains\Wallet\Http\Resources\WalletResource;
use App\Domains\User\Subdomains\Wallet\Models\Wallet;
use App\Domains\User\Subdomains\Wallet\Services\CreateWalletService;
use App\Http\Controllers\Controller;

class CreateWalletController extends Controller implements CreateWalletControllerInterface
{
    protected CreateWalletService $createWalletService;

    public function __construct(CreateWalletService $createWalletService)
    {
        $this->createWalletService = $createWalletService;
    }

    public function __invoke(WalletRequest $request): WalletResource
    {
        return new WalletResource($this->createWalletService->handle($request->all()));
    }

}
