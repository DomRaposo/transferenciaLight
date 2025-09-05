<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepositRequest;
use App\Services\WalletService;

class DepositController extends Controller
{
    protected $walletService;

    public function __construct(WalletService $walletService)
    {
        $this->walletService = $walletService;
    }

    public function deposit(DepositRequest $request)
    {
        $user = auth()->user();
        $transaction = $this->walletService->deposit($user, $request->validated()['amount']);

        return response()->json([
            'transaction' => $transaction,
            'message' => 'Depósito realizado com sucesso.'
        ]);
    }
}
