<?php

namespace App\Domains\User\Subdomains\Purchase\Http\Requests;

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

        if ($this->isMethod('PUT')) {
            return $this->getUpdateValidation();
        }

        return [];
    }

    protected function getCreateValidation(): array
    {
        return [
            'description' => ['nullable', 'max:256', 'string'],
            'store_name' => ['nullable', 'max:256', 'string'],
            'store_id' => ['nullable', 'integer'],
            'date' => ['nullable', 'date'],
            'origin_id' => ['required', 'integer'],
            'wallet_id' => ['required', 'integer'],
            'user_id' => ['required', ' integer'],
            'value' => ['required'],
            'is_installments' => ['required'],
            'installments_number' => ['nullable', 'integer']
        ];
    }

    protected function getUpdateValidation(): array
    {
        return [
            'description' => ['nullable', 'string', 'max:256'],
            'store_name' => ['nullable', 'string', 'max:256'],
            'store_id' => ['nullable', 'integer'],
            'date' => ['nullable', 'date'],
            'origin_id' => ['nullable', 'integer'],
            'wallet_id' => ['nullable', 'integer'],
            'user_id' => ['nullable', 'integer'],
            'value' => ['nullable'],
            'is_installments' => ['nullable', 'boolean'],
            'installments_number' => ['nullable', 'integer'],
        ];
    }

}
