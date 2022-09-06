<?php

namespace App\Domains\User\Subdomains\Purchase\Models\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

interface WalletInterface
{
    public function user(): BelongsTo;

    public function purchase(): HasMany;
}
