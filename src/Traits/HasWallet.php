<?php

namespace OpenNebel\EWallet\Traits;

use Illuminate\Database\Eloquent\Collection;
use OpenNebel\EWallet\Models\Currency;
use OpenNebel\EWallet\Models\Wallet;

trait HasWallet
{
    /**
     * @param string $name
     * @param Currency|int $currency
     * @return Wallet
     */
    public function addWallet(string $name = "", Currency|int $currency = 0): Wallet
    {
        if (is_int($currency)) {
            $currency = Currency::find($currency);
        }

        return Wallet::create([
            'owner_id' => $this->id,
            'owner_type' => get_class($this),
            'currency_id' => $currency->id,
            'balance' => 0,
            'name' => empty($name) ? "{$currency->name} Wallet" : $name,
        ]);
    }

    /**
     * @return Collection /Illuminate/Database/Eloquent/Collection
     */
    public function getWallets(): \Illuminate\Database\Eloquent\Collection
    {
        return Wallet::where('owner_id', $this->id)->get();
    }
}
