<?php

namespace App\Domains\Admin\Subdomains\User\Repositories\Interfaces;

interface DeleteUserRepositoryInterface
{
    public function delete(int $id): void;
}
