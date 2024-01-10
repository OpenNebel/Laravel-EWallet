<?php

namespace OpenNebel\EWallet\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use OpenNebel\EWallet\Models\Currency;
use OpenNebel\EWallet\Models\Wallet as WalletModel;

interface Wallet
{

    /**
     * @param string $name
     * @param Currency|int|null $currency
     * @param float|int $balance
     * @return WalletModel
     */
    public function addWallet(string $name = "", Currency|int $currency = null, float|int $balance = 0): WalletModel;

    /**
     * @return Collection<int, WalletModel>
     */
    public function getWallets(): Collection;

    /**
     * @param WalletModel|int|string|null $wallet
     * @return Wallet|null
     */
    public function getWallet(WalletModel|int|string|null $wallet = null): WalletModel|null;

    /**
     * @param Currency|int $currency
     * @return Collection<int, WalletModel>
     */
    public function getWalletsByCurrency(Currency|int $currency): Collection;


    public function getGeneralBalance(Currency|int $currency): float;
}
