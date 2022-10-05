<?php

namespace App\Domains\User\Subdomains\Purchase\Repositories\Interfaces;

use App\Domains\User\Subdomains\Purchase\Models\Purchase;
use Illuminate\Database\Eloquent\Collection;

interface PurchaseRepositoryInterface
{
    public function create(array $data): Purchase;

    public function list(int $user_id): Collection;

    public function getByID(int $id): Purchase;

    public function update(array $data, int $id): Purchase;

    public function delete(int $id): void;
}
