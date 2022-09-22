<?php

namespace App\Domains\User\Subdomains\Purchase\Services\Interfaces;

use App\Domains\User\Subdomains\Purchase\Models\Purchase;

interface CreateInstallmentServiceInterface
{
    public function handle(Purchase $purchase): void;
}
