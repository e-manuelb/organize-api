<?php

namespace App\Domains\User\Subdomains\Origin\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OriginResource extends JsonResource
{

    public function toArray($request): array
    {
        return parent::toArray($request);
    }

}
