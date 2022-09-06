<?php

namespace App\Domains\User\Subdomains\Purchase\Http\Controllers;

use App\Domains\User\Subdomains\Purchase\Http\Controllers\Interfaces\UpdatePurchaseInterface;
use App\Domains\User\Subdomains\Purchase\Http\Requests\PurchaseRequest;
use App\Domains\User\Subdomains\Purchase\Http\Resources\PurchaseResource;
use App\Domains\User\Subdomains\Purchase\Models\Purchase;
use App\Http\Controllers\Controller;

class UpdatePurchaseController extends Controller implements UpdatePurchaseInterface
{
    public function __invoke(PurchaseRequest $request, int $id): PurchaseResource
    {
        $purchase = (new Purchase())->findOrFail($id);

        $purchase->update($request->all());

        return new PurchaseResource($purchase);
    }
}
