<?php

namespace App\Http\Controllers\User\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Resources\Purchase\PurchaseResource;
use App\Models\Purchase;

class ListPurchasesController extends Controller
{
    public function __invoke(): PurchaseResource
    {
        $purchases = (new Purchase)->where('user_id', '=', auth()->user()->id)->get();

        return new PurchaseResource($purchases);
    }
}
