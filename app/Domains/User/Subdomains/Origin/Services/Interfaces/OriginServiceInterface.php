<?php

namespace App\Domains\User\Subdomains\Origin\Services\Interfaces;

use App\Domains\User\Subdomains\Origin\Models\Origin;

interface OriginServiceInterface
{
    public function create(array $data): Origin;
}
