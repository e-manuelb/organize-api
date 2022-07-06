<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Purchase extends Model
{
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
