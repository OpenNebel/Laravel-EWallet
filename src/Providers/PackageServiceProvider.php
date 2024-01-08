<?php

declare(strict_types=1);

namespace OpenNebel\EWallet\Providers;

use Illuminate\Support\ServiceProvider;

final class PackageServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../../config/wallet.php' => config_path('wallet.php'),
        ]);

        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
    }
}
