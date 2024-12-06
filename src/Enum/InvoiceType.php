<?php

declare(strict_types=1);

namespace DigitalTunnel\Zatca\Enum;

enum InvoiceType: string
{
    case Invoice = 'Invoice'; // Invoice

    case DebitNote = 'Debit'; // Debit Note
    case CreditNote = 'Credit'; // Credit Note
}
