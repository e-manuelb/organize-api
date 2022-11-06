<?php

namespace App\Domains\User\Subdomains\Purchase\Http\Controllers;

use App\Domains\User\Subdomains\Purchase\Http\Controllers\Interfaces\PurchaseControllerInterface;
use App\Domains\User\Subdomains\Purchase\Http\Resources\PurchaseResource;
use App\Domains\User\Subdomains\Purchase\Http\Requests\PurchaseRequest;
use App\Domains\User\Subdomains\Purchase\Services\PurchaseService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class PurchaseController extends Controller implements PurchaseControllerInterface
{
    protected PurchaseService $purchaseService;

    public function __construct(PurchaseService $purchaseService)
    {
        $this->purchaseService = $purchaseService;
    }

    public function create(PurchaseRequest $request): PurchaseResource
    {
        return new PurchaseResource($this->purchaseService->create($request->validated()));
    }

    public function index(): PurchaseResource
    {
        return new PurchaseResource($this->purchaseService->list(auth()->id()));
    }

    public function show(int $id): PurchaseResource
    {
        return new PurchaseResource($this->purchaseService->getByID($id));
    }

    public function update(PurchaseRequest $request, int $id): PurchaseResource
    {
        return new PurchaseResource($this->purchaseService->update($request->validated(), $id));
    }

    public function delete(int $id): JsonResponse
    {
        $this->purchaseService->delete($id);

        return response()->json([
            'message' => "Purchase $id was deleted successfully."
        ]);
    }
}
