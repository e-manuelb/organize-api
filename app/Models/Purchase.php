<?php

namespace App\Models;

use App\Domains\User\Subdomains\Wallet\Models\Interfaces\PurchaseInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Purchase extends Model
{
    use HasFactory;

    protected $table = 'purchases';
}
