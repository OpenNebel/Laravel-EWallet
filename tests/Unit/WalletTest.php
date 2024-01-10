<?php

use OpenNebel\EWallet\Models\Currency;
use OpenNebel\EWallet\Models\Wallet;

beforeEach(function () {
    $this->currency = Currency::create([
        "name" => "US Dollar",
        "code" => "USD",
        "symbol" => "$",
        "rate" => 1,
        "status" => 1,
        "is_default" => 1
    ]);
});

test('confirm environment is set to testing', function () {
    expect(config('app.env'))->toBe('local');
});

test('addWallet() method adds a wallet to the owner with all parameters', function () {
    $user = GenerateUser();
    $wallet = $user->addWallet("Test Wallet", 1, 100);

    expect($wallet->balance)
        ->toBe(100)
        ->and($wallet->name)
        ->toBe("Test Wallet");
});

test('addWallet() method adds a wallet to the owner with default parameters', function () {
    $user = GenerateUser();
    $wallet = $user->addWallet();

    expect($wallet)
        ->toBeInstanceOf(Wallet::class);
});

test('addWallet() method adds a wallet to the owner with default name', function () {
    $user = GenerateUser();
    $wallet = $user->addWallet(currency: 1, balance: 100);

    expect($wallet->balance)
        ->toBe(100)
        ->and($wallet->name)
        ->toBe(Currency::find(1)->name . " Wallet");
});

test('addWallet() method adds a wallet to the owner with default balance', function () {
    $user = GenerateUser();
    $wallet = $user->addWallet("Test Wallet", 1);

    expect($wallet->balance)
        ->toBe(0)
        ->and($wallet->name)
        ->toBe("Test Wallet");
});

test('getWallet() method returns the first wallet if no wallet is passed', function () {
    $user = GenerateUser();

    $name = fake()->name;

    $wallet = $user->addWallet($name, 1, 100);

    expect($user->getWallet($wallet))
        ->toBe($wallet);
});

test('getWallet() method returns the wallet by id', function () {
    $user = GenerateUser();

    $name = fake()->name;

    $wallet = $user->addWallet($name, 1, 100);

    expect($user->getWallet($wallet->id)->id)
        ->toBe($wallet->id);
});

test('getWallet() method returns the wallet by name', function () {
    $user = GenerateUser();

    $name = fake()->name;

    $wallet = $user->addWallet($name, 1, 100);

    expect($user->getWallet($name)->id)
        ->toBe($wallet->id);
});

test('getWallet() method throws an exception if the wallet does not exist', function () {
    $user = GenerateUser();

    $name = fake()->name;

    expect($user->getWallet($name))->toBe(null);

});

test('getWallet() method throws an exception if the wallet does not belong to the owner', function () {
    $user = GenerateUser();

    $name = fake()->name;

    $wallet = $user->addWallet($name, 1, 100);

    $user2 = GenerateUser();

    expect($user2->getWallet($wallet->id))->toBe(null);
});

test('getWallets() method returns all wallets of the owner', function () {
    $user = GenerateUser();

    $name = fake()->name;

    $user->addWallet($name, 1, 100);

    expect($user->getWallets()->count())->toBe(1);
});

test('getWalletsByCurrency() method returns all wallets of the owner by currency', function () {
    $user = GenerateUser();

    $name = fake()->name;

    $user->addWallet($name, 1, 100);

    expect($user->getWalletsByCurrency(1)->count())->toBe(1);
});

test('getGeneralBalance() method returns the general balance of the owner by currency', function () {
    $user = GenerateUser();

    $name = fake()->name;

    $user->addWallet($name, 1, 100);

    expect($user->getGeneralBalance(1))->toBe(100.0);
});

