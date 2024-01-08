<?php

namespace OpenNebel\EWallet\Traits;

use OpenNebel\EWallet\Models\Currency;
use OpenNebel\EWallet\Models\Wallet;

trait HasWallet
{

    public function addWallet(Currency|int $currency): Wallet
    {
        if (is_int($currency)) {
            $currency = Currency::find($currency);
        }

        return Wallet::create([
            'owner_id' => $this->id,
            'owner_type' => get_class($this),
            'currency_id' => $currency->id,
            'balance' => 0,
        ]);
    }
}
