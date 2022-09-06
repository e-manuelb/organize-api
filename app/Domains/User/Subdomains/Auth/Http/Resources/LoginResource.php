<?php

namespace App\Domains\User\Subdomains\Auth\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
