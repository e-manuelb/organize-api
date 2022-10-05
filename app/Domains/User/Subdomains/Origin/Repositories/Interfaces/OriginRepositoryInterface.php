<?php

namespace App\Domains\User\Subdomains\Origin\Repositories\Interfaces;

use App\Domains\User\Subdomains\Origin\Models\Origin;

interface OriginRepositoryInterface
{
    public function create(array $data): Origin;
}
