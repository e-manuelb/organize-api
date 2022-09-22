<?php

namespace App\Domains\Admin\Subdomains\User\Http\Controllers;

use App\Domains\Admin\Subdomains\User\Http\Controllers\Interfaces\DeleteUserControllerInterface;
use App\Domains\Admin\Subdomains\User\Models\User;
use App\Domains\Admin\Subdomains\User\Services\DeleteUserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class DeleteUserController extends Controller implements DeleteUserControllerInterface
{
    protected DeleteUserService $deleteUserService;

    public function __construct(DeleteUserService $deleteUserService)
    {
        $this->deleteUserService = $deleteUserService;
    }

    public function __invoke(int $id): JsonResponse
    {
        $this->deleteUserService->handle($id);

        return response()->json([
            'message' => "User $id was deleted successfully."
        ]);
    }
}
