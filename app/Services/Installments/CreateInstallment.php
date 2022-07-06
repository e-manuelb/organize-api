<?php

namespace App\Services\Installments;

use App\Models\Installment;
use App\Models\Purchase;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateInstallment
{
    use AsAction;

    public function handle(Purchase $purchase): void
    {
        $value = round(($purchase->value / $purchase->installments_number), 2);
        $installment = collect();

        for ($i = 1; $i <= $purchase->installments_number; $i++) {
            $installment->push([
                'purchase_id' => $purchase->id,
                'value' => $value,
                'installment_number' => $i,
                'created_at' => now()
            ]);
        }

        Installment::insert($installment->toArray());
    }
}
