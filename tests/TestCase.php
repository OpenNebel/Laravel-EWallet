<?php

namespace OpenNebel\EWallet\Tests;

use OpenNebel\EWallet\Providers\EWalletServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            EWalletServiceProvider::class,
        ];
    }
}
