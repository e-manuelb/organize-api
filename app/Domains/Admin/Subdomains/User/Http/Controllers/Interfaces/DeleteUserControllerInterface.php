<?php

namespace App\Domains\Admin\Subdomains\User\Http\Controllers\Interfaces;

use Illuminate\Http\JsonResponse;

interface DeleteUserControllerInterface
{
    public function __invoke(int $id): JsonResponse;
}
