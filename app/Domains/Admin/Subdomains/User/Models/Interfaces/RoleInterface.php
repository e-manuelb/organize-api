<?php

namespace App\Domains\Admin\Subdomains\User\Models\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface RoleInterface
{
    public function users(): HasMany;
}
