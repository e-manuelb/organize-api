<?php

namespace App\Domains\User\Services;

use App\Domains\User\Models\User;
use App\Domains\User\Repositories\UpdateUserRepository;
use App\Domains\User\Services\Interfaces\UpdateUserServiceInterface;
use Illuminate\Support\Facades\Hash;

class UpdateUserService implements UpdateUserServiceInterface
{
    protected UpdateUserRepository $updateUserRepository;

    public function __construct(UpdateUserRepository $updateUserRepository)
    {
        $this->updateUserRepository = $updateUserRepository;
    }

    public function handle(array $data, int $id): User
    {
        if (collect($data)->has('password')) {
            $data['password'] = Hash::make($data['password']);
        }

        return $this->updateUserRepository->update($data, $id);
    }

}
