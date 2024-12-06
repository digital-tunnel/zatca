<?php

declare(strict_types=1);

namespace DigitalTunnel\Zatca;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class ZatcaServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Register a class in the service container
        $this->app->bind('ZatcaConnect', function () {
            return new ZatcaConnect();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/config/zatcaconnect.php' => config_path('zatcaconnect.php'),
        ]);

        AliasLoader::getInstance()
            ->alias('ZatcaConnect', 'DigitalTunnel\\Zatca\\Facades\\ZatcaConnect');
    }
}
