<?php

namespace App\Domains\Admin\Subdomains\User\Models\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

interface UserInterface
{
    public function purchase(): HasMany;

    public function wallet(): HasMany;

    public function origin(): HasMany;

    public function role(): HasOne;
}
