<?php

namespace App\Domains\Admin\Subdomains\User\Services;

use App\Domains\Admin\Subdomains\User\Models\User;
use App\Domains\Admin\Subdomains\User\Repositories\Interfaces\UpdateUserRepositoryInterface;
use App\Domains\Admin\Subdomains\User\Services\Interfaces\UpdateUserServiceInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class UpdateUserService implements UpdateUserServiceInterface
{
    protected UpdateUserRepositoryInterface $updateUserRepository;

    public function __construct(UpdateUserRepositoryInterface $updateUserRepository)
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
