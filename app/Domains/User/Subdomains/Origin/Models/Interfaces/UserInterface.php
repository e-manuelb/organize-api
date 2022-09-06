<?php

namespace App\Domains\User\Subdomains\Origin\Models\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface UserInterface
{
    public function origin(): HasMany;
}
