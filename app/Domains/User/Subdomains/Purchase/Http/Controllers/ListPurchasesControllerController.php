<?php

namespace App\Domains\User\Subdomains\Purchase\Http\Controllers;

use App\Domains\User\Subdomains\Purchase\Http\Controllers\Interfaces\ListPurchasesControllerInterface;
use App\Domains\User\Subdomains\Purchase\Http\Resources\PurchaseResource;
use App\Domains\User\Subdomains\Purchase\Models\Purchase;
use App\Domains\User\Subdomains\Purchase\Services\ListPurchasesService;
use App\Http\Controllers\Controller;

class ListPurchasesControllerController extends Controller implements ListPurchasesControllerInterface
{
    protected ListPurchasesService $listPurchasesService;

    public function __construct(ListPurchasesService $listPurchasesService)
    {
        $this->listPurchasesService = $listPurchasesService;
    }

    public function __invoke(): PurchaseResource
    {
        return new PurchaseResource($this->listPurchasesService->handle(auth()->id()));
    }
}
