<?php

namespace App\Domains\Admin\Subdomains\User\Repositories\Interfaces;

use App\Domains\Admin\Subdomains\User\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function create(array $data): User;

    public function list(): Collection;

    public function getByID(int $id): User;

    public function update(array $data, int $id): User;

    public function delete(int $id): void;
}
