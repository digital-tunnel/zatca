<?php

declare(strict_types=1);

namespace DigitalTunnel\Zatca\Enum;

enum TransactionType: string
{
    case Invoice = 'Invoice'; // B2B Invoice

    case Simplified = 'Simplified'; // B2B Invoice
}
