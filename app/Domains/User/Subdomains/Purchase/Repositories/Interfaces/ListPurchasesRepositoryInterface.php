<?php

namespace App\Domains\User\Subdomains\Purchase\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface ListPurchasesRepositoryInterface
{
    public function list(int $id): Collection;
}
