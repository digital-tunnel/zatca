<?php

declare(strict_types=1);

namespace DigitalTunnel\Zatca\Helpers;

class DeviceDetector
{
    private string $osName;

    private string $deviceId;

    public function __construct()
    {
        $this->detectOS();
        $this->fetchDeviceId();
    }

    private function detectOS(): void
    {
        $uname = php_uname('s');

        if (str_contains($uname, 'Darwin')) {
            $this->osName = 'MacOS';
        } elseif (str_contains($uname, 'Linux')) {
            $this->osName = 'Linux';
        } elseif (str_contains($uname, 'Win')) {
            $this->osName = 'Windows';
        } else {
            $this->osName = 'Unknown';
        }
    }

    private function fetchDeviceId(): void
    {
        $this->deviceId = match ($this->osName) {
            'MacOS' => $this->getMacUUID(),
            'Linux' => $this->getLinuxUUID(),
            'Windows' => $this->getWindowsUUID(),
            default => 'Unknown',
        };
    }

    public function getOSName(): string
    {
        return $this->osName;
    }

    public function getDeviceId(): string
    {
        return $this->deviceId;
    }

    private function getMacUUID(): string
    {
        // Execute command to get system UUID on macOS
        $command = '/usr/sbin/system_profiler SPHardwareDataType | awk \'/UUID/ { print $3; }\'';

        return trim(shell_exec($command));
    }

    private function getLinuxUUID(): string
    {
        // Attempt to read UUID from /sys/class/dmi/id/product_uuid
        $uuid = @file_get_contents('/sys/class/dmi/id/product_uuid');
        if ($uuid !== false) {
            return trim($uuid);
        } else {
            return 'UUID not available';
        }
    }

    private function getWindowsUUID(): string
    {
        // Execute command to get system UUID on Windows
        $command = 'wmic csproduct get UUID';
        $output = shell_exec($command);
        $lines = explode("\n", $output);
        if (isset($lines[1])) {
            return trim($lines[1]);
        } else {
            return 'UUID not available';
        }
    }
}
