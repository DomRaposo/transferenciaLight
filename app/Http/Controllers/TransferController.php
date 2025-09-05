<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransferRequest;
use App\Services\TransferService;

class TransferController extends Controller
{
    protected $transferService;

    public function __construct(TransferService $transferService)
    {
        $this->transferService = $transferService;
    }

    public function transfer(TransferRequest $request)
    {
        $user = auth()->user();
        $transaction = $this->transferService->transfer(
            $user,
            $request->validated()['receiver_wallet_id'],
            $request->validated()['amount']
        );

        return response()->json([
            'transaction' => $transaction,
            'message' => 'Transferência realizada com sucesso.'
        ]);
    }
}
