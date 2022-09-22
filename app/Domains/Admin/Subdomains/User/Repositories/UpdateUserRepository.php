<?php

namespace App\Domains\Admin\Subdomains\User\Repositories;

use App\Domains\Admin\Subdomains\User\Models\User;
use App\Domains\Admin\Subdomains\User\Repositories\Interfaces\UpdateUserRepositoryInterface;

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
