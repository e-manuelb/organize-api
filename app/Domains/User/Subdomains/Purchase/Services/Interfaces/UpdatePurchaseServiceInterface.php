<?php

namespace App\Domains\User\Subdomains\Purchase\Services\Interfaces;

use App\Domains\User\Subdomains\Purchase\Models\Purchase;

interface UpdatePurchaseServiceInterface
{
    public function handle(array $data, int $id): Purchase;
}
