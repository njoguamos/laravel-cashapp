<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Cash App Environment
    |--------------------------------------------------------------------------
    |
    | Here, you specify whether your Cash App integration is in production.
    | When the value is false, the application uses sandbox a which
    | allows Cash App API integration without moving any money.
    |
    | @see https://developers.cash.app/docs/api/partner-onboarding/integrating-with-cash-app-pay/comparison
    |
    */

    'production' => env(key: 'CASHAPP_PRODUCTION', default: false),

    /*
     |--------------------------------------------------------------------------
     | Cash App Base Urls
     |--------------------------------------------------------------------------
     |
     | Here, you specify either "sandbox" or "production." The "sandbox" is used
     | for testing API integration without moving any money. The "production"
     | means your application is live, using Pay Kit for the production.
     |
     |
     */

    'urls' => [
        'sandbox'    => env(key: 'CASHAPP_SANDBOX_URL', default: 'https://sandbox.api.cash.app'),
        'production' => env(key: 'CASHAPP_PRODUCTION_URL', default: 'https://api.cash.app'),
    ],

    /*
     |--------------------------------------------------------------------------
     | Cash App Regions
     |--------------------------------------------------------------------------
     |
     | A character code representing the regions closest to where application
     | services are hosted. The value must be a supported  region OR IATA
     | airport codes else API will through `INVALID_REGION` error.
     |
     | @see https://developers.cash.app/docs/api/technical-documentation/api-fundamentals/requests/regions-and-localization#supported-region--iata-airport-codes
     |
     */

    'region' => env(key: 'CASHAPP_REGION', default: 'PDX')
];
