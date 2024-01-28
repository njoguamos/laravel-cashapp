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
    | Cash App Client ID
    |--------------------------------------------------------------------------
    |
    | Here you specify the <client_id> associated with your cash app account.
    | The <client id> is use to construct the authorisation header. The
    | client ID can be shared with the customers' browsers or POS.
    |
    | Starts with `CAS-CI_` for sandbox and `CA-CI_` for production.
    |
    | @see https://developers.cash.app/docs/api/technical-documentation%2Fapi-fundamentals%2Frequests%2Fmaking-requests#authorization
    |
   */

    'client_id' => env(key: 'CASHAPP_CLIENT_ID'),

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
        'sandbox'    => 'https://sandbox.api.cash.app',
        'production' => 'https://api.cash.app',
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

    'region' => env(key: 'CASHAPP_REGION', default: 'PDX'),

    /*
     |--------------------------------------------------------------------------
     | Cash App API Version
     |--------------------------------------------------------------------------
     |
     | Here we specify the Cash APP API version. This package is fixed to
     | to a specific version to avoid accidental breaking changes.
     | A new API version will results to a new major release.
     |
     | @see https://developers.cash.app/docs/api/technical-documentation/api-fundamentals/requests/api-versioning
     |
     */

    'versions' => [
        'customer'   => 'v1', // Support Window (subject to change): January 1st, 2022 - March 1st, 2027
        'network'    => 'v1', // Support Window (subject to change): January 1st, 2022 - March 1st, 2027
        'management' => 'v1' //Support Window (subject to change): January 1st, 2022 - March 1st, 2027
    ]
];
