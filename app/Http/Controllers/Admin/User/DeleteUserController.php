<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class DeleteUserController extends Controller
{
    public function __invoke(int $id): JsonResponse
    {
        $user = (new User())->findOrFail($id);

        $user->delete();

        return response()->json([
            'message' => "User $user->id was deleted successfully."
        ]);
    }
}
