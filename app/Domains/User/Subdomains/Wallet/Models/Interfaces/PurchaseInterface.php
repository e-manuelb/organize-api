<?php

namespace App\Domains\User\Subdomains\Wallet\Models\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

interface PurchaseInterface
{
    public function wallet(): HasOne;

    public function user(): BelongsTo;
}
