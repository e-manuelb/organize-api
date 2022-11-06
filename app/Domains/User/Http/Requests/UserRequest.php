<?php

namespace App\Domains\User\Http\Requests;

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

        if ($this->isMethod('PUT')) {
            return $this->getUpdateValidation();
        }

        return [];
    }

    protected function getCreateValidation(): array
    {
        return [
            'first_name' => ['required', 'max:256', 'string'],
            'middle_name' => ['nullable', 'max:256', 'string'],
            'last_name' => ['required', 'max:256', 'string'],
            'email' => ['required', 'max:256', 'unique:users', 'email'],
            'password' => ['required', 'min:8', 'max:256', 'string']
        ];
    }

    public function getUpdateValidation(): array
    {
        return [
            'first_name' => ['nullable', 'max:256', 'string'],
            'middle_name' => ['nullable', 'max:256', 'string'],
            'last_name' => ['nullable', 'max:256', 'string'],
            'email' => ['nullable', 'max:256', 'unique:users', 'email'],
            'password' => ['nullable', 'min:8', 'max:256', 'string']
        ];
    }
}
