<?php

namespace Njoguamos\CashApp\Tests;

use NjoguAmos\CashApp\Connectors\CashAppBaseConnector;

it(description: 'resolves to the correct base url', closure: function (bool $isProduction, string $baseUrl) {
    config()->set(
        key: 'cashapp.production',
        value: $isProduction
    );

    $connector = new CashAppBaseConnector();

    expect(value: $connector->resolveBaseUrl())
        ->toBe(expected: $baseUrl);
})->with([
    'production' => [true, 'https://api.cash.app'],
    'staging'=> [false, 'https://sandbox.api.cash.app']
]);
