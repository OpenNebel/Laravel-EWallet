<?php

namespace OpenNebel\EWallet\Interfaces;

use OpenNebel\EWallet\Models\Currency;

interface Wallet
{

    public function addWallet(Currency|int $currency): Wallet;
}
