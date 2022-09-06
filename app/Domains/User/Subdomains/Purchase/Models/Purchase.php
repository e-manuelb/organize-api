<?php

namespace App\Domains\User\Subdomains\Purchase\Models;

use App\Domains\User\Subdomains\Purchase\Models\Interfaces\PurchaseInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

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

    public function origin(): HasOne
    {
        return $this->hasOne(Origin::class);
    }

    public function wallet(): HasOne
    {
        return $this->hasOne(Wallet::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
