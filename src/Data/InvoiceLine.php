<?php

declare(strict_types=1);

namespace DigitalTunnel\Zatca\Data;

use DigitalTunnel\Zatca\Enum\TaxExemptionCode;
use DigitalTunnel\Zatca\Enum\UnitType;

class InvoiceLine
{
    public function __construct(
        public int $id,
        public string $name,
        public int $quantity,
        public float $unitPrice,
        public UnitType $unitType,
        public float $taxableAmount,
        public float $taxAmount,
        public float $taxPercentage,
        public ?TaxExemptionCode $exemptionCode = null,
        public ?string $note = null,
    ) {}

    /**
     * Convert the Invoice Line to an array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'quantity' => $this->quantity,
            'unit_price' => $this->unitPrice,
            'unit_type' => $this->unitType?->value,
            'taxable_amount' => $this->taxableAmount,
            'tax_amount' => $this->taxAmount,
            'tax_percentage' => $this->taxPercentage,
            'exemption_code' => $this->exemptionCode?->value ?? null,
            'note' => $this->note ?? null,
        ];
    }
}
