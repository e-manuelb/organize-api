<?php

namespace App\Domains\Admin\Subdomains\User\Models\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

interface WalletInterface
{
    public function user(): BelongsTo;

    public function purchases(): HasMany;
}
