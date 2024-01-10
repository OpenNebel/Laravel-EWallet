<?php

declare(strict_types=1);

namespace OpenNebel\EWallet\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use OpenNebel\EWallet\Providers\EWalletServiceProvider;
use Orchestra\Testbench\Attributes\WithMigration;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase;

#[WithMigration]
class EWalletTestCase extends TestCase
{
    use WithWorkbench;
//    use RefreshDatabase;

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.connections.testbench', [
            'driver' => 'mysql',
            'host' => '127.0.0.1',
            'port' => '3306',
            'database' => 'laravel',
            'username' => 'root',
            'password' => 'root',
        ]);
        config()->set('database.default', 'testbench');
    }

    protected function getPackageProviders($app): array
    {
        return [
            EWalletServiceProvider::class,
        ];
    }
}
