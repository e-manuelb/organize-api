<?php

namespace App\Domains\User\Repositories;

use App\Domains\User\Models\User;
use App\Domains\User\Repositories\Interfaces\UpdateUserRepositoryInterface;

class UpdateUserRepository implements UpdateUserRepositoryInterface
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function update(array $data, int $id): User
    {
        $user = (new User())->findOrFail($id);

        $user->update($data);

        return $user;
    }

}
