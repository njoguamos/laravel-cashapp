<?php

namespace NjoguAmos\CashApp\Connectors;

use Illuminate\Support\Facades\File;
use NjoguAmos\CashApp\Exceptions\InvalidRegionException;
use Saloon\Http\Connector;

abstract class BaseConnector extends Connector
{
    protected bool $isProduction;

    protected string $baseUrl;

    protected string $region;

    protected string $apiKey;

    protected string $clientId;

    abstract public function getApiVersion(): string;

    public function __construct()
    {
        $this->isProduction = config(key: 'cashapp.production');

        if ($this->isProduction) {
            $this->baseUrl = config(key: 'cashapp.urls.production');
        } else {
            $this->baseUrl = config(key: 'cashapp.urls.sandbox');
        }

        $this->region = config(key: 'cashapp.region');

        $this->clientId = config(key: 'cashapp.client_id');

        // @TODO: To Implement - get api from database, findOrFail
        $this->apiKey = 'REPLACE-DUMMY-API-KEY';
    }

    /**
     * @throws InvalidRegionException
     */
    public function getRegionHeader(): array
    {
        $region = collect(value: File::json(path: './data/regions.json'))
            ->firstWhere(key: 'code', operator: '=', value: $this->region);

        if (!$region) {
            throw new InvalidRegionException();
        }

        return  ['X-Region' => $region['code'] ];
    }

    public function getAuthorisation(bool $includeApiKey = false): string
    {
        return $includeApiKey ? "$this->clientId $this->apiKey" : $this->clientId ;
    }

}
