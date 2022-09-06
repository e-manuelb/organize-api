<?php

namespace App\Domains\User\Subdomains\Wallet\Models;

use App\Domains\User\Subdomains\Wallet\Models\Interfaces\PurchaseInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Purchase extends Model implements PurchaseInterface
{
    use HasFactory;

    protected $table = 'purchases';

    protected $fillable = [
        'description',
        'store_name',
        'store_id',
        'date',
        'origin_id',
        'wallet_id',
        'value',
        'is_installments',
        'installments_number',
        'user_id'
    ];

    public function wallet(): HasOne
    {
        return $this->hasOne(Wallet::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
