<?php

declare(strict_types=1);

namespace DigitalTunnel\Zatca\Data;

use DigitalTunnel\Zatca\Enum\InvoiceType;
use DigitalTunnel\Zatca\Enum\PaymentMethod;
use DigitalTunnel\Zatca\Enum\TransactionType;
use InvalidArgumentException;

class Invoice
{
    public function __construct(
        public TransactionType $transactionType,
        public InvoiceType $invoiceType,
        public string $invoiceNumber,
        public string $invoiceDateTime,
        public string $deliveryDateTime,
        public PaymentMethod $paymentMethod,
        public PartyInformation $company,
        public PartyInformation $customer,
        public array $lines,
        public InvoiceTotals $totals,
        public ?string $pih = null,
        public ?string $billingReference = null,
        public ?string $instructionNote = null,
    ) {
        $this->validateLines($lines);
    }

    /**
     * Convert the Invoice to an array.
     */
    public function toArray(): array
    {
        return [
            'transaction_type' => $this->transactionType?->value,
            'invoice_type' => $this->invoiceType?->value,
            'invoice_number' => $this->invoiceNumber,
            'invoice_date_time' => $this->invoiceDateTime,
            'delivery_date_time' => $this->deliveryDateTime,
            'payment_method' => $this->paymentMethod?->value,
            'company' => $this->company->toArray(),
            'customer' => $this->customer->toArray(),
            'lines' => array_map(fn (InvoiceLine $line) => $line->toArray(), $this->lines),
            'totals' => $this->totals->toArray(),
            'pih' => $this->pih,
            'billing_reference' => $this->billingReference,
            'instruction_note' => $this->instructionNote,
        ];
    }

    private function validateLines(array $lines): void
    {
        foreach ($lines as $line) {
            if (! $line instanceof InvoiceLine) {
                throw new InvalidArgumentException('Invalid Invoice Line');
            }
        }
    }
}
