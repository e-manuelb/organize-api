<?php

namespace App\Http\Controllers\Origin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Origin\OriginRequest;
use App\Http\Resources\Origin\OriginResource;
use App\Models\Origin;

class CreateOriginController extends Controller
{
    public function __invoke(OriginRequest $request): OriginResource
    {
        $origin = Origin::create($request->all());

        return new OriginResource($origin);
    }

}
