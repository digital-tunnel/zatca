<?php

declare(strict_types=1);

namespace DigitalTunnel\Zatca\Enum;

enum TaxExemptionCode: string
{
    case FINANCIAL_SERVICES = 'VATEX-SA-29';
    case LIFE_INSURANCE_SERVICES = 'VATEX-SA-29-7';
    case REAL_ESTATE_TRANSACTIONS = 'VATEX-SA-30';
    case EXPORT_OF_GOODS = 'VATEX-SA-32';
    case EXPORT_OF_SERVICES = 'VATEX-SA-33';
    case INTERNATIONAL_TRANSPORT_OF_GOODS = 'VATEX-SA-34-1';
    case INTERNATIONAL_TRANSPORT_OF_PASSENGERS = 'VATEX-SA-34-2';
    case SERVICES_INCIDENTAL_TO_INTERNATIONAL_PASSENGER_TRANSPORT = 'VATEX-SA-34-3';
    case SUPPLY_OF_QUALIFYING_MEANS_OF_TRANSPORT = 'VATEX-SA-34-4';
    case SERVICES_RELATED_TO_GOODS_OR_PASSENGER_TRANSPORTATION = 'VATEX-SA-34-5';
    case MEDICINES_AND_MEDICAL_EQUIPMENT = 'VATEX-SA-35';
    case QUALIFYING_METALS = 'VATEX-SA-36';
    case PRIVATE_EDUCATION_TO_CITIZEN = 'VATEX-SA-EDU';
    case PRIVATE_HEALTHCARE_TO_CITIZEN = 'VATEX-SA-HEA';

    /**
     * Get the description for the tax exemption reason.
     */
    public function description(): string
    {
        return match ($this) {
            self::FINANCIAL_SERVICES => 'Financial services mentioned in Article 29 of the VAT Regulations',
            self::LIFE_INSURANCE_SERVICES => 'Life insurance services mentioned in Article 29 of the VAT Regulations',
            self::REAL_ESTATE_TRANSACTIONS => 'Real estate transactions mentioned in Article 30 of the VAT Regulations',
            self::EXPORT_OF_GOODS => 'Export of goods',
            self::EXPORT_OF_SERVICES => 'Export of services',
            self::INTERNATIONAL_TRANSPORT_OF_GOODS => 'The international transport of goods',
            self::INTERNATIONAL_TRANSPORT_OF_PASSENGERS => 'International transport of passengers',
            self::SERVICES_INCIDENTAL_TO_INTERNATIONAL_PASSENGER_TRANSPORT => 'Services directly connected and incidental to a supply of international passenger transport',
            self::SUPPLY_OF_QUALIFYING_MEANS_OF_TRANSPORT => 'Supply of a qualifying means of transport',
            self::SERVICES_RELATED_TO_GOODS_OR_PASSENGER_TRANSPORTATION => 'Any services relating to goods or passenger transportation, as defined in Article 25 of the VAT Regulations',
            self::MEDICINES_AND_MEDICAL_EQUIPMENT => 'Medicines and medical equipment',
            self::QUALIFYING_METALS => 'Qualifying metals',
            self::PRIVATE_EDUCATION_TO_CITIZEN => 'Private education to citizens',
            self::PRIVATE_HEALTHCARE_TO_CITIZEN => 'Private healthcare to citizens',
        };
    }
}
