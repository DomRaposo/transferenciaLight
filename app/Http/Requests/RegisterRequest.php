<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // autoriza todos, altere se quiser checar permissões
    }

    public function rules(): array
    {
        return [
            'fullName' => 'required|string|max:255',
            'email'    => 'required|string|email|unique:users,email',
            'cpf'      => 'required|string|unique:users,cpf',
            'password' => 'required|string|min:6|confirmed',
            'type'     => 'required|in:common,merchant',
        ];
    }
}
