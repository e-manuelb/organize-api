<?php

namespace App\Domains\Admin\Subdomains\User\Repositories;

use App\Domains\Admin\Subdomains\User\Repositories\Interfaces\ListUsersRepositoryInterface;
use App\Domains\Admin\Subdomains\User\Models\User;
use Illuminate\Database\Eloquent\Collection;

class ListUsersRepository implements ListUsersRepositoryInterface
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function list(): Collection
    {
        return $this->user->get();
    }
}
