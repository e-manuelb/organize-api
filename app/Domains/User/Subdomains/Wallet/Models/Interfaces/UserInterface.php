<?php

namespace App\Domains\User\Subdomains\Wallet\Models\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface UserInterface
{
    public function purchase(): HasMany;

    public function wallet(): HasMany;
}
