<?php

namespace App\Domains\User\Subdomains\Purchase\Models\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface UserInterface
{
    public function purchase(): HasMany;

    public function wallet(): HasMany;

    public function origin(): HasMany;
}
