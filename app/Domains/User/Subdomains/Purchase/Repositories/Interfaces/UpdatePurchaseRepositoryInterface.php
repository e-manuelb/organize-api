<?php

namespace App\Domains\User\Subdomains\Purchase\Repositories\Interfaces;

use App\Domains\User\Subdomains\Purchase\Models\Purchase;

interface UpdatePurchaseRepositoryInterface
{
    public function update(array $data, int $id): Purchase;
}
