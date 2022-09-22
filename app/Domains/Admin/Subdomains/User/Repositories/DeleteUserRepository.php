<?php

namespace App\Domains\Admin\Subdomains\User\Repositories;

use App\Domains\Admin\Subdomains\User\Models\User;
use App\Domains\Admin\Subdomains\User\Repositories\Interfaces\DeleteUserRepositoryInterface;

class DeleteUserRepository implements DeleteUserRepositoryInterface
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function delete(int $id): void
    {
        $this->user->findOrFail($id)->delete();
    }
}
