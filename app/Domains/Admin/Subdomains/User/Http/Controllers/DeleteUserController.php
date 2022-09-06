<?php

namespace App\Domains\Admin\Subdomains\User\Http\Controllers;

use App\Domains\Admin\Subdomains\User\Http\Controllers\Interfaces\DeleteUserInterface;
use App\Domains\Admin\Subdomains\User\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class DeleteUserController extends Controller implements DeleteUserInterface
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
