<?php

declare(strict_types=1);

namespace DigitalTunnel\Zatca\Enum;

enum UnitType: string
{
    case Unit = 'unit';
    case Piece = 'piece';

    /**
     * Get the label for the enum value.
     */
    public function label(): string
    {
        return match ($this) {
            self::Unit => 'Unit',
            self::Piece => 'Piece',
        };
    }
}
