<?php

namespace App\Domains\User\Subdomains\Purchase\Http\Controllers\Interfaces;

use App\Domains\User\Subdomains\Purchase\Http\Requests\PurchaseRequest;
use App\Domains\User\Subdomains\Purchase\Http\Resources\PurchaseResource;

interface CreatePurchaseInterface
{
    public function __invoke(PurchaseRequest $request): PurchaseResource;
}
