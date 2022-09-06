<?php

namespace App\Domains\User\Subdomains\Purchase\Http\Controllers;

use App\Domains\User\Subdomains\Purchase\Http\Controllers\Interfaces\DeletePurchaseInterface;
use App\Domains\User\Subdomains\Purchase\Models\Purchase;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class DeletePurchaseController extends Controller implements DeletePurchaseInterface
{
    public function __invoke(int $id): JsonResponse
    {
        $purchase = (new Purchase())->findOrFail($id);

        $purchase->delete();

        return response()->json([
            'message' => "Purchase $purchase->id was deleted successfully."
        ]);
    }
}
