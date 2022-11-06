<?php

namespace App\Domains\User\Subdomains\Origin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OriginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'max:256'],
            'user_id' => ['required', 'integer']
        ];
    }

}
