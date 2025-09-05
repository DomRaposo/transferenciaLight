<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'wallet_id',
        'type', // 'deposit' ou 'transfer'
        'amount',
        'receiver_wallet_id', // null para depósitos
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    // Carteira que realizou a transação
    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }

    // Carteira que recebeu a transferência
    public function receiverWallet()
    {
        return $this->belongsTo(Wallet::class, 'receiver_wallet_id');
    }
}
