<?php

namespace App\Domains\Admin\Subdomains\User\Services;

use App\Domains\Admin\Subdomains\User\Repositories\Interfaces\UserRepositoryInterface;
use App\Domains\Admin\Subdomains\User\Services\Interfaces\UserServiceInterface;
use App\Domains\Admin\Subdomains\User\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(array $data): User
    {
        $data['password'] = Hash::make($data['password']);

        return $this->userRepository->create($data);
    }

    public function list(): Collection
    {
        return $this->userRepository->list();
    }

    public function getByID(int $id): User
    {
        return $this->userRepository->getByID($id);
    }

    public function update(array $data, int $id): User
    {
        if (collect($data)->has('password')) {
            $data['password'] = Hash::make($data['password']);
        }

        return $this->userRepository->update($data, $id);
    }

    public function delete(int $id): void
    {
        $this->userRepository->delete($id);
    }
}
