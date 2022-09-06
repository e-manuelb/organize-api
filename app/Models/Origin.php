<?php

namespace App\Models;

use App\Domains\User\Subdomains\Origin\Models\Interfaces\OriginInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Origin extends Model
{
    use HasFactory;

    protected $table = 'origins';
}
