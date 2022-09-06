<?php

namespace App\Domains\User\Subdomains\Purchase\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseResource extends JsonResource
{
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
