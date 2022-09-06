<?php

namespace App\Domains\User\Subdomains\Wallet\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WalletRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'user_id' => 'required'
        ];
    }

}
