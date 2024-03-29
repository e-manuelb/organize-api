<?php

namespace App\Domains\Admin\Subdomains\User\Models;

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
