<?php

namespace App\Domains\User\Subdomains\Purchase\Http\Controllers;

use App\Domains\User\Subdomains\Purchase\Http\Controllers\Interfaces\UpdatePurchaseControllerInterface;
use App\Domains\User\Subdomains\Purchase\Http\Requests\PurchaseRequest;
use App\Domains\User\Subdomains\Purchase\Http\Resources\PurchaseResource;
use App\Domains\User\Subdomains\Purchase\Models\Purchase;
use App\Domains\User\Subdomains\Purchase\Services\UpdatePurchaseService;
use App\Http\Controllers\Controller;

class UpdatePurchaseControllerController extends Controller implements UpdatePurchaseControllerInterface
{
    protected UpdatePurchaseService $updatePurchaseService;

    public function __construct(UpdatePurchaseService $updatePurchaseService)
    {
        $this->updatePurchaseService = $updatePurchaseService;
    }

    public function __invoke(PurchaseRequest $request, int $id): PurchaseResource
    {
        return new PurchaseResource($this->updatePurchaseService->handle($request->all(), $id));
    }
}
