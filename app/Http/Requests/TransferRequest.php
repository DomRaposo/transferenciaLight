<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransferRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'receiver_wallet_id' => 'required|exists:wallets,id',
            'amount'             => 'required|numeric|min:0.01',
        ];
    }
}
