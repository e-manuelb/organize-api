<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Resources\Purchase\PurchaseResource;
use App\Http\Requests\Purchase\PurchaseRequest;
use App\Http\Controllers\Controller;
use App\Models\Purchase;

class CreatePurchaseController extends Controller
{
    public function __invoke(PurchaseRequest $request) {

        $purchase = Purchase::create($request->all());

        return new PurchaseResource($purchase);
    }

}
