<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\JsonResponse;

class DeletePurchaseController extends Controller
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
