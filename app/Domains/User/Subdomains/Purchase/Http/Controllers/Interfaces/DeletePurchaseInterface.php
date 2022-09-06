<?php

namespace App\Domains\User\Subdomains\Purchase\Http\Controllers\Interfaces;

use Illuminate\Http\JsonResponse;

interface DeletePurchaseInterface
{
    public function __invoke(int $id): JsonResponse;
}
