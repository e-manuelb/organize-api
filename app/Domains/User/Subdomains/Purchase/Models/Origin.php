<?php

namespace App\Domains\User\Subdomains\Purchase\Models;

use App\Domains\User\Subdomains\Purchase\Models\Interfaces\OriginInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

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
