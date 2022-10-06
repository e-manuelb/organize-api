<?php

namespace App\Domains\User\Subdomains\Origin\Http\Controllers;

use App\Domains\User\Subdomains\Origin\Http\Controllers\Interfaces\OriginControllerInterface;
use App\Domains\User\Subdomains\Origin\Http\Requests\OriginRequest;
use App\Domains\User\Subdomains\Origin\Http\Resources\OriginResource;
use App\Domains\User\Subdomains\Origin\Models\Origin;
use App\Domains\User\Subdomains\Origin\Services\OriginService;
use App\Http\Controllers\Controller;

class OriginController extends Controller implements OriginControllerInterface
{
    protected OriginService $originService;

    public function __construct(OriginService $originService)
    {
        $this->originService = $originService;
    }

    public function create(OriginRequest $request): OriginResource
    {
        return new OriginResource($this->originService->create($request->all()));
    }

    public function getForUser(): OriginResource
    {
        return new OriginResource($this->originService->getForUser(auth()->id()));
    }
}
