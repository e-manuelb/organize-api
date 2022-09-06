<?php

namespace App\Domains\User\Subdomains\Purchase\Models\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

interface PurchaseInterface
{
    public function origin(): HasOne;

    public function wallet(): HasOne;

    public function user(): BelongsTo;
}
