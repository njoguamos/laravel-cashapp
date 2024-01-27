<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Cash APP Environment
    |--------------------------------------------------------------------------
    |
    | Here, you specify whether your Cash App integration is in production.
    | When the value is false, the application uses sandbox a which
    | allows Cash App API integration without moving any money.
    |
    | @see https://developers.cash.app/docs/api/partner-onboarding/integrating-with-cash-app-pay/comparison
    |
    */

    'production' => env(key: 'CASH_PRODUCTION', default: false),

    /*
     |--------------------------------------------------------------------------
     | Cash APP Base Urls
     |--------------------------------------------------------------------------
     |
     | Here, you specify either "sandbox" or "production." The "sandbox" is used
     | for testing API integration without moving any money. The "production"
     | means your application is live, using Pay Kit for the production.
     |
     |
     */

    'urls' => [
        'sandbox'    => env(key: 'CASH_APP_SANDBOX_URL', default: 'https://sandbox.api.cash.app'),
        'production' => env(key: 'CASH_APP_PRODUCTION_URL', default: 'https://api.cash.app'),
    ]
];