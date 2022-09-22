<?php

namespace App\Domains\User\Services;

use App\Domains\User\Models\User;
use App\Domains\User\Repositories\CreateUserRepository;
use App\Domains\User\Services\Interfaces\CreateUserServiceInterface;

class CreateUserService implements CreateUserServiceInterface
{
    protected CreateUserRepository $createUserRepository;

    public function __construct(CreateUserRepository $createUserRepository)
    {
        $this->createUserRepository = $createUserRepository;
    }

    public function handle(array $data): User
    {
        return $this->createUserRepository->create($data);
    }
}
