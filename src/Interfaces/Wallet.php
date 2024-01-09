<?php

namespace OpenNebel\EWallet\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use OpenNebel\EWallet\Models\Currency;

interface Wallet
{

    /**
     * @param string $name
     * @param Currency|int|null $currency
     * @param float|int $balance
     * @return \OpenNebel\EWallet\Models\Wallet
     */
    public function addWallet(string $name = "", Currency|int $currency = null, float|int $balance = 0): \OpenNebel\EWallet\Models\Wallet;

    /**
     * @return Collection
     */
    public function getWallets(): Collection;

    /**
     * @param \OpenNebel\EWallet\Models\Wallet|int|string|null $wallet
     * @return Wallet|null
     */
    public function getWallet(\OpenNebel\EWallet\Models\Wallet|int|string|null $wallet = null): Wallet|null;

    /**
     * @param Currency|int $currency
     * @return Collection
     */
    public function getWalletsByCurrency(Currency|int $currency): Collection;
}
