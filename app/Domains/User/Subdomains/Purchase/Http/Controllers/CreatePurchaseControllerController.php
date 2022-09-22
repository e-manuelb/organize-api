<?php

namespace App\Domains\User\Subdomains\Purchase\Http\Controllers;

use App\Domains\User\Subdomains\Purchase\Http\Controllers\Interfaces\CreatePurchaseControllerInterface;
use App\Domains\User\Subdomains\Purchase\Models\Purchase;
use App\Domains\User\Subdomains\Purchase\Services\CreatePurchaseService;
use App\Domains\User\Subdomains\Purchase\Services\Installments\CreateInstallmentService;
use App\Domains\User\Subdomains\Purchase\Http\Resources\PurchaseResource;
use App\Domains\User\Subdomains\Purchase\Http\Requests\PurchaseRequest;
use App\Http\Controllers\Controller;

class CreatePurchaseControllerController extends Controller implements CreatePurchaseControllerInterface
{
    protected CreatePurchaseService $createPurchaseService;

    public function __construct(CreatePurchaseService $createPurchaseService)
    {
        $this->createPurchaseService = $createPurchaseService;
    }

    public function __invoke(PurchaseRequest $request): PurchaseResource
    {
        return new PurchaseResource($this->createPurchaseService->handle($request->all()));
    }

}
