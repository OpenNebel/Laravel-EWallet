<?php

namespace OpenNebel\EWallet\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use OpenNebel\EWallet\Models\Currency;

interface Wallet
{

    /**
     * @param string $name
     * @param Currency|int $currency
     * @return \OpenNebel\EWallet\Models\Wallet
     */
    public function addWallet(string $name = "", Currency|int $currency = 0): \OpenNebel\EWallet\Models\Wallet;


    public function getWallets(): Collection;
}
