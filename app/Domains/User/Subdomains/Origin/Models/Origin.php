<?php

namespace App\Domains\User\Subdomains\Origin\Models;

use App\Domains\User\Subdomains\Origin\Models\Interfaces\OriginInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Origin extends Model implements OriginInterface
{
    use HasFactory;

    protected $table = 'origins';

    protected $fillable = ['name', 'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
