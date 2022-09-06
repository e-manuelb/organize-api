<?php

namespace App\Domains\User\Subdomains\Wallet\Models;

use App\Domains\User\Subdomains\Wallet\Models\Interfaces\WalletInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Wallet extends Model implements WalletInterface
{
    use HasFactory;

    protected $table = 'wallets';

    protected $fillable = ['name', 'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function purchase(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }
}
