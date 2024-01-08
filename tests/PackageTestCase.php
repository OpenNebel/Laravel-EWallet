<?php

declare(strict_types=1);

namespace OpenNebel\EWallet\Tests;

use OpenNebel\EWallet\Providers\PackageServiceProvider;
use Orchestra\Testbench\TestCase;

class PackageTestCase extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            PackageServiceProvider::class,
        ];
    }
}
