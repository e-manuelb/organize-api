<?php

namespace App\Domains\User\Subdomains\Purchase\Services\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface ListPurchasesServiceInterface
{
    public function handle(int $id): Collection;
}
