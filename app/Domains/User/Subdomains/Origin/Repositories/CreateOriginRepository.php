<?php

namespace App\Domains\User\Subdomains\Origin\Repositories;

use App\Domains\User\Subdomains\Origin\Models\Origin;
use App\Domains\User\Subdomains\Origin\Repositories\Interfaces\CreateOriginRepositoryInterface;

class CreateOriginRepository implements CreateOriginRepositoryInterface
{
    protected Origin $origin;

    public function __construct(Origin $origin)
    {
        $this->origin = $origin;
    }

    public function create(array $data): Origin
    {
        return $this->origin->create($data);
    }
}
