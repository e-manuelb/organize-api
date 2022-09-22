<?php

namespace App\Domains\User\Subdomains\Purchase\Http\Controllers\Interfaces;

use Illuminate\Http\JsonResponse;

interface DeletePurchaseControllerInterface
{
    public function __invoke(int $id): JsonResponse;
}
