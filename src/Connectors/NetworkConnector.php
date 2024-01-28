<?php

namespace NjoguAmos\CashApp\Connectors;

use NjoguAmos\CashApp\Exceptions\InvalidRegionException;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\PendingRequest;

class NetworkConnector extends BaseConnector
{
    protected array $regionHeader;

    /** @throws InvalidRegionException */
    public function __construct()
    {
        parent::__construct();

        $this->regionHeader = $this->getRegionHeader();
    }

    public function boot(PendingRequest $pendingRequest): void
    {
        $pendingRequest->headers()->add(key: 'X-Signature', value: 'Test');
    }

    protected function defaultAuth(): TokenAuthenticator
    {
        return new TokenAuthenticator(
            token: $this->getAuthorisation(includeApiKey: true),
            prefix: 'Authorization'
        );
    }

    public function resolveBaseUrl(): string
    {
        return $this->baseUrl . '/network/'. $this->getApiVersion();
    }

    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            ...$this->regionHeader
        ];
    }

    public function getApiVersion(): string
    {
        return config(key: 'cashapp.versions.network');
    }
}
