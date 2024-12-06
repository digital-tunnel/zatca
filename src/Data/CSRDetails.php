<?php

declare(strict_types=1);

namespace DigitalTunnel\Zatca\Data;

use DigitalTunnel\Zatca\Helpers\EGSSerialNumber;

class CSRDetails
{
    public function __construct(
        public string $deviceName,
        public string $organizationIdentifier,
        public string $organizationUnitName,
        public string $organizationName,
        public string $countryName,
        public string $address,
        public string $businessCategory,
    ) {}

    /**
     * Export CSR Details to an array
     */
    public function generateCsr(): array
    {
        $serialNumber = EGSSerialNumber::make(
            solutionName: $this->deviceName,
        );

        return [
            'name' => $this->deviceName.'-'.rand(100000000, 999999999).'-'.$this->organizationIdentifier,
            'serial_number' => $serialNumber->toString(),
            'organization_identifier' => $this->organizationIdentifier,
            'organization_unit_name' => $this->organizationUnitName,
            'organization_name' => $this->organizationName,
            'country_name' => $this->countryName,
            'address' => $this->address,
            'business_category' => $this->businessCategory,
        ];
    }
}
