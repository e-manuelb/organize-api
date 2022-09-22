<?php

namespace App\Domains\Admin\Subdomains\User\Services\Interfaces;

interface DeleteUserServiceInterface
{
    public function handle(int $id): void;
}
