<?php

namespace App\Domains\User\Subdomains\Origin\Services\Interfaces;

use App\Domains\User\Subdomains\Origin\Models\Origin;

interface CreateOriginServiceInterface
{
    public function handle(array $data): Origin;
}
