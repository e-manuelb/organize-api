<?php

namespace App\Domains\User\Subdomains\Purchase\Repositories\Interfaces;

interface DeletePurchaseRepositoryInterface
{
    public function delete(int $id): void;
}
