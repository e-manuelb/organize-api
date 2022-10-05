<?php

namespace App\Domains\User\Services;

use App\Domains\User\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use App\Domains\User\Models\User;

class UserService
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(array $data): User
    {
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
