<?php

namespace App\Domains\User\Subdomains\Origin\Services;

use App\Domains\User\Subdomains\Origin\Repositories\Interfaces\OriginRepositoryInterface;
use App\Domains\User\Subdomains\Origin\Services\Interfaces\OriginServiceInterface;
use App\Domains\User\Subdomains\Origin\Models\Origin;

class OriginService implements OriginServiceInterface
{
    protected OriginRepositoryInterface $originRepository;

    public function __construct(OriginRepositoryInterface $originRepository)
    {
        $this->originRepository = $originRepository;
    }

    public function create(array $data): Origin
    {
        return $this->originRepository->create($data);
    }
}
