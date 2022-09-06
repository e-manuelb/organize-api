<?php

namespace App\Domains\Admin\Subdomains\User\Models;

use App\Domains\Admin\Subdomains\User\Models\Interfaces\RoleInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model implements RoleInterface
{
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
