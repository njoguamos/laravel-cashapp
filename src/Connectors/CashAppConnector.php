<?php

namespace NjoguAmos\CashApp\Connectors;

use Illuminate\Support\Facades\File;
use NjoguAmos\CashApp\Exceptions\InvalidRegionException;
use Saloon\Http\Connector;

class CashAppConnector extends Connector
{
    protected string $region;

    /**
     * @throws InvalidRegionException
     */
    public function __construct()
    {
        $this->region = config(key: 'cashapp.region');

        $this->shouldThrowRegionException();
    }

    public function resolveBaseUrl(): string
    {
        if (config(key: 'cashapp.production')) {
            return config(key: 'cashapp.urls.production') ;
        }

        return  config(key: 'cashapp.urls.sandbox');
    }

    protected function defaultHeaders(): array
    {
        return [
            'Accept'      => 'application/json',
            'X-Region'    => $this->region,
            'X-Signature' => '@TODO',
        ];
    }

    /** @throws InvalidRegionException */
    protected function shouldThrowRegionException(): void
    {
        $region = collect(value: File::json('./data/regions.json'))
            ->firstWhere(key: 'code', operator: $this->region);

        if (!$region) {
            throw new InvalidRegionException();
        }
    }
}
