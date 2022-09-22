<?php

namespace App\Domains\User\Subdomains\Purchase\Services\Interfaces;

interface DeletePurchaseServiceInterface
{
    public function handle(int $id): void;
}
