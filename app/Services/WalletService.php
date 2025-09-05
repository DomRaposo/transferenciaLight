<?php

namespace App\Services;

use App\Repositories\WalletRepository;
use App\Models\User;

class WalletService
{
    protected $walletRepository;

    public function __construct(WalletRepository $walletRepository)
    {
        $this->walletRepository = $walletRepository;
    }

    public function createWalletForUser(User $user)
    {
        return $this->walletRepository->create([
            'user_id' => $user->id,
            'balance' => 0,
        ]);
    }
}
