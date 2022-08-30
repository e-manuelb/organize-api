<?php

namespace App\Http\Controllers\User\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Requests\Purchase\PurchaseRequest;
use App\Http\Resources\Purchase\PurchaseResource;
use App\Models\Purchase;

class UpdatePurchaseController extends Controller
{
    public function __invoke(PurchaseRequest $request, int $id): PurchaseResource
    {
        $purchase = (new Purchase())->findOrFail($id);

        $purchase->update($request->all());

        return new PurchaseResource($purchase);
    }
}
