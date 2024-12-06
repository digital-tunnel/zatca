<?php

declare(strict_types=1);

namespace DigitalTunnel\Zatca\Helpers;

class EGSSerialNumber
{
    private string $deviceModelOrVersion;

    private string $deviceSerialNumber;

    public function __construct(
        public string $solutionName,
    ) {
        $this->deviceModelOrVersion = (new DeviceDetector)->getOSName();
        $this->deviceSerialNumber = (new DeviceDetector)->getDeviceId();
    }

    public static function make(
        string $solutionName,
    ): static {
        return new static(
            solutionName: $solutionName,
        );
    }

    public function toString(): string
    {
        return "1-{$this->solutionName}|2-{$this->deviceModelOrVersion}|3-{$this->deviceSerialNumber}";
    }
}
