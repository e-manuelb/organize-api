<?php

namespace App\Domains\User\Subdomains\Purchase\Repositories\Interfaces;

use App\Domains\User\Subdomains\Purchase\Models\Purchase;

interface CreatePurchaseRepositoryInterface
{
    public function create(array $data): Purchase;
}
