<?php

namespace App\Domains\User\Subdomains\Purchase\Http\Controllers;

use App\Domains\User\Subdomains\Purchase\Http\Controllers\Interfaces\ListPurchasesInterface;
use App\Domains\User\Subdomains\Purchase\Http\Resources\PurchaseResource;
use App\Domains\User\Subdomains\Purchase\Models\Purchase;
use App\Http\Controllers\Controller;

class ListPurchasesController extends Controller implements ListPurchasesInterface
{
    public function __invoke(): PurchaseResource
    {
        $purchases = (new Purchase)->where('user_id', '=', auth()->user()->id)->get();

        return new PurchaseResource($purchases);
    }
}
