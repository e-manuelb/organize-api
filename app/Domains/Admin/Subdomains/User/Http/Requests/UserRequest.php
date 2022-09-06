<?php

namespace App\Domains\Admin\Subdomains\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'unique:users', 'email'],
            'password' => ['required', 'min:8', 'max:255']
        ];
    }
}
