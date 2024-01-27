<?php

namespace NjoguAmos\CashApp\Connectors;

use Saloon\Http\Connector;

class CashAppBaseConnector extends Connector
{
    public function resolveBaseUrl(): string
    {
        if (config(key: 'cashapp.production')) {
            return config(key: 'cashapp.urls.production') ;
        }

        return  config(key: 'cashapp.urls.sandbox');
    }
}
