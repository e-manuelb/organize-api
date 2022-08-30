<?php

namespace App\Http\Requests\Origin;

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
            'name' => ['required', 'max:255'],
            'user_id' => ['required']
        ];
    }

}
