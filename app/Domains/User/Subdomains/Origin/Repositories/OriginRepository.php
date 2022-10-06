<?php

namespace App\Domains\User\Subdomains\Origin\Repositories;

use App\Domains\User\Subdomains\Origin\Models\Origin;
use App\Domains\User\Subdomains\Origin\Repositories\Interfaces\OriginRepositoryInterface;

class OriginRepository implements OriginRepositoryInterface
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

    public function getForUser(int $user_id): ?Origin
    {
        return $this->origin->where('user_id', $user_id)->first();
    }
}
