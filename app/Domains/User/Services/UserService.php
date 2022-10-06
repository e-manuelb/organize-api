<?php

namespace App\Domains\User\Services;

use App\Domains\User\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\Roles;
use Illuminate\Support\Facades\Hash;
use App\Domains\User\Models\User;
use Illuminate\Support\Str;

class UserService
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(array $data): User
    {
        $data['password'] = Hash::make($data['password']);
        $data['api_token'] = Str::random(60);
        $data['role_id'] = Roles::USER;

        return $this->userRepository->create($data);
    }

    public function update(array $data, int $id): User
    {
        if (collect($data)->has('password')) {
            $data['password'] = Hash::make($data['password']);
        }

        return $this->userRepository->update($data, $id);
    }
}
