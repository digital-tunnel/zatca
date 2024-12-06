<?php

declare(strict_types=1);

namespace DigitalTunnel\Zatca\Enum;

enum PaymentMethod: int
{
    case InstrumentNotDefined = 1;
    case InCash = 10;
    case Credit = 30;
    case PaymentToBankAccount = 42;
    case BankCard = 48;

    public function label(): string
    {
        return match ($this) {
            self::InstrumentNotDefined => 'Instrument Not Defined',
            self::InCash => 'In Cash',
            self::Credit => 'Credit',
            self::PaymentToBankAccount => 'Payment to Bank Account',
            self::BankCard => 'Bank Card',
        };
    }
}
