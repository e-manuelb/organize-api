<?php

namespace App\Domains\Admin\Subdomains\User\Repositories;

use App\Domains\Admin\Subdomains\User\Models\User;
use App\Domains\Admin\Subdomains\User\Repositories\Interfaces\CreateUserRepositoryInterface;

class CreateUserRepository implements CreateUserRepositoryInterface
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
}
