<?php

namespace App\Domains\Admin\Subdomains\User\Services;

use App\Domains\Admin\Subdomains\User\Models\User;
use App\Domains\Admin\Subdomains\User\Repositories\Interfaces\CreateUserRepositoryInterface;
use App\Domains\Admin\Subdomains\User\Services\Interfaces\CreateUserServiceInterface;
use Illuminate\Support\Facades\Hash;

class CreateUserService implements CreateUserServiceInterface
{
    protected CreateUserRepositoryInterface $createUserRepository;

    public function __construct(CreateUserRepositoryInterface $createUserRepository)
    {
        $this->createUserRepository = $createUserRepository;
    }

    public function handle(array $data): User
    {
        $data['password'] = Hash::make($data['password']);

        return $this->createUserRepository->create($data);
    }
}
