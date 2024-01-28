<?php

namespace Njoguamos\CashApp\Tests;

use NjoguAmos\CashApp\Connectors\CashAppConnector;
use NjoguAmos\CashApp\Exceptions\InvalidRegionException;

it(description: 'resolves to the correct base url', closure: function (bool $isProduction, string $baseUrl) {
    config()->set(
        key: 'cashapp.production',
        value: $isProduction
    );

    $connector = new CashAppConnector();

    expect(value: $connector->resolveBaseUrl())
        ->toBe(expected: $baseUrl);
})->with([
    'production' => [true, 'https://api.cash.app'],
    'staging'    => [false, 'https://sandbox.api.cash.app']
]);

it(description: 'sets Accept header to application/json', closure: function () {
    $connector = new CashAppConnector();

    expect(value: $connector->headers()->get(key: 'Accept'))->toBe(expected: 'application/json');
});

it(description: 'sets region header from config', closure: function () {
    $connector = new CashAppConnector();

    expect(value: $connector->headers()->get(key: 'X-Region'))->toBe(expected: config(key: 'cashapp.region'));
});

it(description: 'throws an exception when invalid region is provided', closure: function () {
    config()->set('cashapp.region', 'HGSF');

    new CashAppConnector();
})->throws(InvalidRegionException::class);
