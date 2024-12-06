<?php

declare(strict_types=1);

namespace DigitalTunnel\Zatca\Data;

use DigitalTunnel\Zatca\Enum\IdentificationType;

class PartyInformation
{
    public function __construct(
        public string $registrationName,
        public string $taxIdentificationNumber,
        public string $identification,
        public IdentificationType $identificationType,
        public Address $address,
    ) {}

    /**
     * Convert the Party Information to an array
     */
    public function toArray(): array
    {
        return [
            'registration_name' => $this->registrationName,
            'tax_identification_number' => $this->taxIdentificationNumber,
            'identification' => $this->identification,
            'identification_type' => $this->identificationType->value,
            'address' => $this->address->toArray(),
        ];
    }
}
