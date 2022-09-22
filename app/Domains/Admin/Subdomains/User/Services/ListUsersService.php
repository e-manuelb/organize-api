<?php

namespace App\Domains\Admin\Subdomains\User\Services;

use App\Domains\Admin\Subdomains\User\Repositories\Interfaces\ListUsersRepositoryInterface;
use App\Domains\Admin\Subdomains\User\Services\Interfaces\ListUsersServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class ListUsersService implements ListUsersServiceInterface
{
    protected ListUsersRepositoryInterface $listUsersRepository;

    public function __construct(ListUsersRepositoryInterface $listUsersRepository)
    {
        $this->listUsersRepository = $listUsersRepository;
    }

    public function handle(): Collection
    {
        return $this->listUsersRepository->list();
    }
}
