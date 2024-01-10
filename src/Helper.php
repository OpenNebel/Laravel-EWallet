<?php

namespace OpenNebel\EWallet;

use OpenNebel\EWallet\Models\Currency;

class Helper
{
    /**
     * Generate a name for the wallet.
     *
     * @param string $name
     * @param Currency|null $currency
     * @return string
     */
    public static function generateWalletName(string $name, Currency|null $currency): string
    {
        return empty($name) ? $currency instanceof Currency ? "{$currency->name} Wallet" : "" : $name;
    }

    /**
     * Get currency instance from mixed input.
     *
     * @param int|Currency|null $currency
     * @return Currency|null
     */
    public static function getCurrencyInstance(Currency|int|null $currency): Currency|null
    {
        return $currency instanceof Currency ? $currency : Currency::find($currency);
    }
}
