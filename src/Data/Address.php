<?php

declare(strict_types=1);

namespace DigitalTunnel\Zatca\Data;

class Address
{
    public function __construct(
        public string $street,
        public int $buildingNumber,
        public int $plotIdentification,
        public string $city,
        public string $district,
        public int $postalCode,
        public string $country,
    ) {}

    /**
     * Convert the Address to an array.
     */
    public function toArray(): array
    {
        return [
            'street' => $this->street,
            'building_number' => $this->buildingNumber,
            'plot_identification' => $this->plotIdentification,
            'city' => $this->city,
            'district' => $this->district,
            'postal_code' => $this->postalCode,
            'country' => $this->country,
        ];
    }
}
