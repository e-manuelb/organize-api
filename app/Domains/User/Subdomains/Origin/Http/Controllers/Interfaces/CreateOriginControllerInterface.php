<?php

namespace App\Domains\User\Subdomains\Origin\Http\Controllers\Interfaces;

use App\Domains\User\Subdomains\Origin\Http\Requests\OriginRequest;
use App\Domains\User\Subdomains\Origin\Http\Resources\OriginResource;

interface CreateOriginControllerInterface
{
    public function __invoke(OriginRequest $request): OriginResource;
}