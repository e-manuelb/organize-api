<?php

namespace App\Domains\User\Subdomains\Purchase\Services\Installments;

use App\Domains\User\Subdomains\Purchase\Services\Interfaces\CreateInstallmentServiceInterface;
use App\Domains\User\Subdomains\Purchase\Models\Installment;
use App\Domains\User\Subdomains\Purchase\Models\Purchase;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateInstallmentService
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
