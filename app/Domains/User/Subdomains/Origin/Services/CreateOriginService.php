<?php

namespace App\Domains\User\Subdomains\Origin\Services;

use App\Domains\User\Subdomains\Origin\Models\Origin;
use App\Domains\User\Subdomains\Origin\Repositories\Interfaces\CreateOriginRepositoryInterface;
use App\Domains\User\Subdomains\Origin\Services\Interfaces\CreateOriginServiceInterface;

class CreateOriginService implements CreateOriginServiceInterface
{
    protected CreateOriginRepositoryInterface $createOriginRepository;

    public function __construct(CreateOriginRepositoryInterface $createOriginRepository)
    {
        $this->createOriginRepository = $createOriginRepository;
    }

    public function handle(array $data): Origin
    {
        return $this->createOriginRepository->create($data);
    }
}
