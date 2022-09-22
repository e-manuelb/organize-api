<?php

namespace App\Domains\User\Subdomains\Purchase\Services\Interfaces;

use App\Domains\User\Subdomains\Purchase\Models\Purchase;

interface CreatePurchaseServiceInterface
{
    public function handle(array $data): Purchase;
}
