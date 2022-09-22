<?php

namespace App\Domains\Admin\Subdomains\User\Services;

use App\Domains\Admin\Subdomains\User\Repositories\Interfaces\DeleteUserRepositoryInterface;
use App\Domains\Admin\Subdomains\User\Services\Interfaces\DeleteUserServiceInterface;

class DeleteUserService implements DeleteUserServiceInterface
{
    protected DeleteUserRepositoryInterface $deleteUserRepository;

    public function __construct(DeleteUserRepositoryInterface $deleteUserRepository)
    {
        $this->deleteUserRepository = $deleteUserRepository;
    }

    public function handle(int $id): void
    {
        $this->deleteUserRepository->delete($id);
    }
}
