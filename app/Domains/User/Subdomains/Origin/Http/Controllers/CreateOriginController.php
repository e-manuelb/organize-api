<?php

namespace App\Domains\User\Subdomains\Origin\Http\Controllers;

use App\Domains\User\Subdomains\Origin\Http\Controllers\Interfaces\CreateOriginInterface;
use App\Domains\User\Subdomains\Origin\Http\Requests\OriginRequest;
use App\Domains\User\Subdomains\Origin\Http\Resources\OriginResource;
use App\Domains\User\Subdomains\Origin\Models\Origin;
use App\Http\Controllers\Controller;

class CreateOriginController extends Controller implements CreateOriginInterface
{
    public function __invoke(OriginRequest $request): OriginResource
    {
        $origin = Origin::create($request->all());

        return new OriginResource($origin);
    }

}
