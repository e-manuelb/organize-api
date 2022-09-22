<?php

namespace App\Domains\User\Subdomains\Purchase\Http\Controllers;

use App\Domains\User\Subdomains\Purchase\Http\Controllers\Interfaces\DeletePurchaseControllerInterface;
use App\Domains\User\Subdomains\Purchase\Models\Purchase;
use App\Domains\User\Subdomains\Purchase\Services\DeletePurchaseService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class DeletePurchaseControllerController extends Controller implements DeletePurchaseControllerInterface
{
    protected DeletePurchaseService $deletePurchaseService;

    public function __construct(DeletePurchaseService $deletePurchaseService)
    {
        $this->deletePurchaseService = $deletePurchaseService;
    }

    public function __invoke(int $id): JsonResponse
    {
        $this->deletePurchaseService->handle($id);

        return response()->json([
            'message' => "Purchase $id was deleted successfully."
        ]);
    }
}
