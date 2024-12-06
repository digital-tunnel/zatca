<?php

declare(strict_types=1);

namespace DigitalTunnel\Zatca\Data;

class InvoiceTotals
{
    public function __construct(
        public float $extensionAmount = 0,
        public float $taxExclusiveAmount = 0,
        public float $taxInclusiveAmount = 0,
        public float $prepaidAmount = 0,
        public float $payableAmount = 0,
        public float $allowanceTotalAmount = 0,
    ) {}

    /**
     * Convert the object to an array
     */
    public function toArray(): array
    {
        return [
            'extension_amount' => $this->extensionAmount,
            'tax_exclusive_amount' => $this->taxExclusiveAmount,
            'tax_inclusive_amount' => $this->taxInclusiveAmount,
            'prepaid_amount' => $this->prepaidAmount,
            'payable_amount' => $this->payableAmount,
            'allowance_amount' => $this->allowanceTotalAmount,
        ];
    }
}
