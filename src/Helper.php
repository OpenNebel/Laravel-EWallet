<?php

namespace OpenNebel\EWallet;

use OpenNebel\EWallet\Models\Currency;

class Helper
{
    /**
     * Generate a name for the wallet.
     *
     * @param string $name
     * @param Currency $currency
     * @return string
     */
    public static function generateWalletName(string $name, Currency $currency): string
    {
        return empty($name) ? "{$currency->name} Wallet" : $name;
    }

    /**
     * Get currency instance from mixed input.
     *
     * @param int|Currency|null $currency
     * @return Currency
     */
    public static function getCurrencyInstance(Currency|int|null $currency): Currency
    {
        if (is_null($currency)) {
            throw new \InvalidArgumentException('Currency is required.');
        }

        return $currency instanceof Currency ? $currency : Currency::findOrFail($currency);
    }
}
