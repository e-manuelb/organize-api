<?php

namespace App\Domains\User\Subdomains\Purchase\Http\Controllers\Interfaces;

use App\Domains\User\Subdomains\Purchase\Http\Resources\PurchaseResource;

interface ListPurchasesInterface
{
    public function __invoke(): PurchaseResource;
}
