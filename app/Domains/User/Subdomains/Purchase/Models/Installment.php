<?php

namespace App\Domains\User\Subdomains\Purchase\Models;

use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    protected $table = 'installments';

    protected $fillable = [
      'purchase_id',
      'value',
      'installment_number'
    ];

    public $timestamps = true;
}
