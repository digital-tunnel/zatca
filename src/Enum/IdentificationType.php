<?php

declare(strict_types=1);

namespace DigitalTunnel\Zatca\Enum;

enum IdentificationType: string
{
    case CommercialRegistrationNumber = 'CRN';
    case MomraLicense = 'MOM';
    case MLSDLicense = 'MLS';
    case SevenHundredNumber = '700';
    case SagiaLicense = 'SAG';
    case Other = 'OTH';
    case TaxIdentificationNumber = 'TIN';
    case NationalID = 'NAT';
    case GCCID = 'GCC';
    case IqamaID = 'IQA';
    case PassportNumber = 'PAS';

    public function label(): string
    {
        return match ($this) {
            self::CommercialRegistrationNumber => 'Commercial Registration Number',
            self::MomraLicense => 'Momra License',
            self::MLSDLicense => 'MLSD License',
            self::SevenHundredNumber => '700 Number',
            self::SagiaLicense => 'Sagia License',
            self::Other => 'Other',
            self::TaxIdentificationNumber => 'Tax Identification Number',
            self::NationalID => 'National ID',
            self::GCCID => 'GCC ID',
            self::IqamaID => 'IQAMA ID',
            self::PassportNumber => 'Passport Number',
        };
    }
}
