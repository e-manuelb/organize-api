<?php

namespace App\Domains\User\Subdomains\Origin\Models\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface OriginInterface
{
    public function user(): BelongsTo;
}
