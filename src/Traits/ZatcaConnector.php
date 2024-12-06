<?php

declare(strict_types=1);

namespace DigitalTunnel\Zatca\Traits;

use Exception;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

trait ZatcaConnector
{
    private string $apiKey;

    private string $apiUrl;

    /**
     * ZatcaConnector constructor.
     *
     * @throws Exception
     */
    public function __construct()
    {
        if (! config('zatcaconnect.api_key')) {
            throw new Exception('Zatca API Key is not set');
        }

        $this->apiKey = config('zatcaconnect.api_key');
        $this->apiUrl = config('zatcaconnect.api_url');
    }

    /**
     * Handle the OnBoarding Process
     *
     * @throws ConnectionException
     */
    public function handleOnBoarding()
    {
        $payload = $this->csrDetails->generateCsr();
        $payload['enviroment'] = $this->enviroment;
        $payload['otp'] = $this->otp;

        return Http::withToken($this->apiKey)
            ->acceptJson()
            ->baseUrl($this->apiUrl)
            ->post('onboarding', $payload)
            ->json();
    }

    /**
     * Sign Invoice by Device UUID Certificate
     *
     * @throws ConnectionException
     */
    public function handleSignInvoice()
    {
        return Http::withToken($this->apiKey)
            ->acceptJson()
            ->baseUrl($this->apiUrl)
            ->asForm()
            ->post('/invoice/sign/'.$this->deviceUuid, $this->invoice->toArray())
            ->json();
    }

    /**
     * ZATCA Invoice Compliance Check
     *
     * @throws ConnectionException
     */
    public function handleCheckCompliance()
    {
        return Http::withToken($this->apiKey)
            ->acceptJson()
            ->baseUrl($this->apiUrl)
            ->get('/invoice/check/'.$this->invoiceUuid)
            ->json();
    }

    /**
     * ZATCA Invoice Details
     *
     * @throws ConnectionException
     */
    public function handleGetInvoice()
    {
        return Http::withToken($this->apiKey)
            ->acceptJson()
            ->baseUrl($this->apiUrl)
            ->get('/invoice/'.$this->invoiceUuid)
            ->json();
    }

    /**
     * Clear Or Report Invoice
     *
     * @throws ConnectionException
     */
    public function handleReportOrClearInvoice()
    {
        return Http::withToken($this->apiKey)
            ->acceptJson()
            ->baseUrl($this->apiUrl)
            ->asForm()
            ->post('/invoice/report-clear/'.$this->invoiceUuid)
            ->json();
    }
}
