<?php

namespace App\Domains\User\Subdomains\Purchase\Http\Controllers\Interfaces;

use App\Domains\User\Subdomains\Purchase\Http\Requests\PurchaseRequest;
use App\Domains\User\Subdomains\Purchase\Http\Resources\PurchaseResource;
use Illuminate\Http\JsonResponse;

interface PurchaseControllerInterface
{
    public function create(PurchaseRequest $request): PurchaseResource;

    public function index(): PurchaseResource;

    public function show(int $id): PurchaseResource;

    public function update(PurchaseRequest $request, int $id): PurchaseResource;

    public function delete(int $id): JsonResponse;
}
