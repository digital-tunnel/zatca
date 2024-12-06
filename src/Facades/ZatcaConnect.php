<?php

declare(strict_types=1);

namespace DigitalTunnel\Zatca\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Mapping Zatca facade to Zatca service
 *
 * @mixin \Digitaltunnel\Zatca\ZatcaConnect
 */
class ZatcaConnect extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'ZatcaConnect';
    }
}
