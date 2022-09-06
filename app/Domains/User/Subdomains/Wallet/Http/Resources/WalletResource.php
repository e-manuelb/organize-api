<?php

namespace App\Domains\User\Subdomains\Wallet\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WalletResource extends JsonResource
{
    public function toArray($request): array
    {
        return parent::toArray($request);
    }

}
