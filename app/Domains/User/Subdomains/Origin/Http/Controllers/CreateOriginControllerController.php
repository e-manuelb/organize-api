<?php

namespace App\Domains\User\Subdomains\Origin\Http\Controllers;

use App\Domains\User\Subdomains\Origin\Http\Controllers\Interfaces\CreateOriginControllerInterface;
use App\Domains\User\Subdomains\Origin\Http\Requests\OriginRequest;
use App\Domains\User\Subdomains\Origin\Http\Resources\OriginResource;
use App\Domains\User\Subdomains\Origin\Models\Origin;
use App\Domains\User\Subdomains\Origin\Services\CreateOriginService;
use App\Http\Controllers\Controller;

class CreateOriginControllerController extends Controller implements CreateOriginControllerInterface
{
    protected CreateOriginService $createOriginService;

    public function __construct(CreateOriginService $createOriginService)
    {
        $this->createOriginService = $createOriginService;
    }

    public function __invoke(OriginRequest $request): OriginResource
    {
        return new OriginResource($this->createOriginService->handle($request->all()));
    }

}
