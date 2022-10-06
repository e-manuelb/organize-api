<?php

namespace App\Domains\User\Subdomains\Origin\Http\Controllers\Interfaces;

use App\Domains\User\Subdomains\Origin\Http\Requests\OriginRequest;
use App\Domains\User\Subdomains\Origin\Http\Resources\OriginResource;

interface OriginControllerInterface
{
    public function create(OriginRequest $request): OriginResource;

    public function getForUser(): OriginResource;
}
