<?php

namespace App\Http\Controllers\User\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Requests\Purchase\PurchaseRequest;
use App\Http\Resources\Purchase\PurchaseResource;
use App\Models\Purchase;
use App\Services\Installments\CreateInstallment;

class CreatePurchaseController extends Controller
{
    public function __invoke(PurchaseRequest $request)
    {
        $purchase = Purchase::create($request->all());

        if ($purchase->is_installments) {
            CreateInstallment::run($purchase);
        }

        return new PurchaseResource($purchase);
    }

}
