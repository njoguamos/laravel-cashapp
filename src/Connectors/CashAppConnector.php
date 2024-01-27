<?php

namespace NjoguAmos\CashApp\Connectors;

use Saloon\Http\Connector;

class CashAppConnector extends Connector
{
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
            'X-Region'    => '@TODO',
            'X-Signature' => '@TODO',
        ];
    }
}
