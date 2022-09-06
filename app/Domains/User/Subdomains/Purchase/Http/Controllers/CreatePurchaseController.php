<?php

namespace App\Domains\User\Subdomains\Purchase\Http\Controllers;

use App\Domains\User\Subdomains\Purchase\Http\Controllers\Interfaces\CreatePurchaseInterface;
use App\Domains\User\Subdomains\Purchase\Models\Purchase;
use App\Domains\User\Subdomains\Purchase\Services\Installments\CreateInstallmentService;
use App\Domains\User\Subdomains\Purchase\Http\Resources\PurchaseResource;
use App\Domains\User\Subdomains\Purchase\Http\Requests\PurchaseRequest;
use App\Http\Controllers\Controller;

class CreatePurchaseController extends Controller implements CreatePurchaseInterface
{
    public function __invoke(PurchaseRequest $request): PurchaseResource
    {
        $purchase = Purchase::create($request->all());

        if ($purchase->is_installments) {
            CreateInstallmentService::run($purchase);
        }

        return new PurchaseResource($purchase);
    }

}
