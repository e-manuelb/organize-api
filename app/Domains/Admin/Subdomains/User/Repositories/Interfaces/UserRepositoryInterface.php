<?php

namespace App\Domains\Admin\Subdomains\User\Repositories\Interfaces;

use Illuminate\Support\Collection as SupportCollection;
use App\Domains\Admin\Subdomains\User\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function create(array $data): User;

    public function list(SupportCollection $params): Collection;

    public function paginate(SupportCollection $params);

    public function getByID(int $id): User;

    public function update(array $data, int $id): User;

    public function delete(int $id): void;
}
