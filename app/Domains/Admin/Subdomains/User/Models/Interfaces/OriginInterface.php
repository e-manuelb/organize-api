<?php

namespace App\Domains\Admin\Subdomains\User\Models\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface OriginInterface
{
    public function user(): BelongsTo;
}
