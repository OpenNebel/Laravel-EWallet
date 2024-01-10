<?php
test('confirm environment is set to testing', function () {
    expect(config('app.env'))->toBe('testing');
});


//
//namespace OpenNebel\EWallet\Traits;
//
//use Illuminate\Database\Eloquent\Collection;
//use InvalidArgumentException;
//use OpenNebel\EWallet\Helper;
//use OpenNebel\EWallet\Models\Currency;
//use OpenNebel\EWallet\Models\Wallet;
//
//trait HasWallet
//{
//    /**
//     * Add a wallet to the owner.
//     *
//     * @param string $name
//     * @param Currency|int|null $currency
//     * @param float|int $balance
//     * @return Wallet
//     */
//    public function addWallet(string $name = "", Currency|int $currency = null, float|int $balance = 0): Wallet
//    {
//        $currency = Helper::getCurrencyInstance($currency);
//
//        return Wallet::create([
//            'owner_id' => $this->id,
//            'owner_type' => get_class($this),
//            'currency_id' => $currency->id,
//            'balance' => $balance,
//            'name' => Helper::generateWalletName($name, $currency)
//        ]);
//    }
//
//    /**
//     * Get wallet by id or first user Wallet.
//     *
//     * @param Wallet|int|string|null $wallet
//     * @return Wallet|null
//     */
//    public function getWallet(Wallet|int|string|null $wallet = null): Wallet|null
//    {
//        if (is_null($wallet)) {
//            $wallet = $this->getWallets()->first();
//
//            if (is_null($wallet)) {
//                throw new InvalidArgumentException('Wallet does not exist.');
//            }
//        }
//
//        if (is_string($wallet)) {
//            $wallet = Wallet::where('name', $wallet)->first();
//        } else {
//            $wallet = $wallet instanceof Wallet ? $wallet : Wallet::findOrFail($wallet);
//        }
//
//        if ($wallet) {
//            if ($wallet->owner_id != $this->id || $wallet->owner_type != get_class($this)) {
//                throw new InvalidArgumentException('Wallet does not belong to this owner.');
//            }
//        }
//
//        return $wallet;
//    }
//
//    /**
//     * @return Collection /Illuminate/Database/Eloquent/Collection
//     */
//    public function getWallets(): Collection
//    {
//        return Wallet::where('owner_id', $this->id)
//            ->where('owner_type', get_class($this))
//            ->get();
//    }
//
//    public function getWalletsByCurrency(Currency|int $currency): Collection
//    {
//        $currency = Helper::getCurrencyInstance($currency);
//
//        return Wallet::where('owner_id', $this->id)
//            ->where('owner_type', get_class($this))
//            ->where('currency_id', $currency->id)
//            ->get();
//    }
//
//    public function getGeneralBalance(Currency|int $currency): float
//    {
//        $currency = Helper::getCurrencyInstance($currency);
//
//        return Wallet::where('owner_id', $this->id)
//            ->where('owner_type', get_class($this))
//            ->where('currency_id', $currency->id)
//            ->sum('balance');
//    }
//}

test('addWallet() method adds a wallet to the owner', function () {
    $user = User::factory()->create();
    $wallet = $user->addWallet('My Wallet', 'USD', 100);

    expect($wallet->name)->toBe('My Wallet');
    expect($wallet->currency->code)->toBe('USD');
    expect($wallet->balance)->toBe(100);
});
