<?php

namespace App\Domains\Admin\Subdomains\User\Repositories;

use App\Domains\Admin\Subdomains\User\Models\User;
use App\Domains\Admin\Subdomains\User\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create(array $data): User
    {
        return $this->user->create($data);
    }

    public function list(): Collection
    {
        return $this->user->get();
    }

    public function getByID(int $id): User
    {
        return $this->user->findOrFail($id);
    }

    public function update(array $data, int $id): User
    {
        $user = (new User())->findOrFail($id);

        $user->update($data);

        return $user;
    }

    public function delete(int $id): void
    {
        $this->user->findOrFail($id)->delete();
    }
}
