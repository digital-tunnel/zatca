<?php

declare(strict_types=1);

namespace DigitalTunnel\Zatca;

use DigitalTunnel\Zatca\Data\CSRDetails;
use DigitalTunnel\Zatca\Data\Invoice;
use DigitalTunnel\Zatca\Traits\ZatcaConnector;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Str;
use InvalidArgumentException;

class ZatcaConnect
{
    use ZatcaConnector;

    protected string $enviroment;

    protected int $otp;

    protected CSRDetails $csrDetails;

    protected string $deviceUuid;

    protected Invoice $invoice;

    protected string $invoiceUuid;

    public function setEnviroment(string $enviroment): static
    {
        if (! in_array($enviroment, ['developer', 'simulation', 'production'])) {
            throw new InvalidArgumentException('Invalid enviroment type');
        }

        $this->enviroment = $enviroment;

        return $this;
    }

    public function setOtp(int $otp): static
    {
        $this->otp = $otp;

        return $this;
    }

    public function setCSRDetails(CSRDetails $csrDetails): static
    {
        $this->csrDetails = $csrDetails;

        return $this;
    }

    public function setDeviceUuid(string $uuid): static
    {
        Str::isUuid($uuid) ?: throw new InvalidArgumentException('Invalid UUID');

        $this->deviceUuid = $uuid;

        return $this;
    }

    public function setInvoice(Invoice $invoice): static
    {
        $this->invoice = $invoice;

        return $this;
    }

    public function setInvoiceUuid(string $invoiceUuid): static
    {
        $this->invoiceUuid = $invoiceUuid;

        return $this;
    }

    /**
     * Device Onboarding
     *
     * @throws ConnectionException
     */
    public function onBoarding()
    {
        return $this->handleOnBoarding();
    }

    /**
     * Sign Invoice by Device UUID Certificate
     *
     *
     * @throws ConnectionException
     */
    public function signInvoice()
    {
        return $this->handleSignInvoice();
    }

    /**
     * Check Invoice Compliance
     *
     *
     * @throws ConnectionException
     */
    public function checkCompliance()
    {
        return $this->handleCheckCompliance();
    }

    /**
     * Get Invoice Details
     *
     *
     * @throws ConnectionException
     */
    public function getInvoice()
    {
        return $this->handleGetInvoice();
    }

    /**
     * Report or Clear Invoice
     *
     * @throws ConnectionException
     */
    public function reportOrClearInvoice()
    {
        return $this->handleReportOrClearInvoice();
    }
}
