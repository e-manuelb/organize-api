<?php

namespace App\Http\Requests\Purchase;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): ?array
    {
        if ($this->isMethod('POST')) {
            return $this->getCreateValidation();
        }

        return [];
    }

    protected function getCreateValidation(): array
    {
        return [
            'description' => 'max:255',
            'store_name' => 'max:255',
            'date' => 'date',
            'origin_id' => 'required',
            'wallet_id' => 'required',
            'value' => 'required',
            'is_installments' => 'required',
            'installments_number' => 'integer',
            'user_id' => 'required'
        ];
    }

}
