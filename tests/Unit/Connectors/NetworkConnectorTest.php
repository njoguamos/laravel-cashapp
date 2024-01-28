<?php

namespace Njoguamos\CashApp\Tests;

use NjoguAmos\CashApp\Connectors\NetworkConnector;
use NjoguAmos\CashApp\Exceptions\InvalidRegionException;

it(description: 'resolves to the correct network base url', closure: function (bool $isProduction, string $baseUrl) {
    config()->set(
        key: 'cashapp.production',
        value: $isProduction
    );

    $connector = new NetworkConnector();

    expect(value: $connector->resolveBaseUrl())
        ->toBe(expected: $baseUrl);
})->with([
    'production' => [true, 'https://api.cash.app/network/v1'],
    'staging'    => [false, 'https://sandbox.api.cash.app/network/v1']
]);

it(description: 'sets `Accept` header to application/json', closure: function () {
    $connector = new NetworkConnector();

    expect(value: $connector->headers()->get(key: 'Accept'))->toBe(expected: 'application/json');
});

it(description: 'sets `X-Region` header from config', closure: function () {
    $connector = new NetworkConnector();

    expect(value: $connector->headers()->get(key: 'X-Region'))->toBe(expected: config(key: 'cashapp.region'));
});

it(description: 'throws an exception when invalid `X-Region` header is provided', closure: function () {
    config()->set(key: 'cashapp.region', value: fake()->word());

    new NetworkConnector();
})->throws(exception: InvalidRegionException::class);


it(description: 'set the correct `X-Signature` header', closure: function () {


})->todo();

it(description: 'set the correct `Authorization` header', closure: function () {
    $clientId = 'LzAcaFiRBoii9otzwET9G7jDPJr/EWKP4Y2itpAEccw=';
    $token = 'REPLACE-DUMMY-API-KEY';

    // @TODO: Update database with a token

    config()->set('cashapp.client_id', $clientId);

    $connector = new NetworkConnector();

    $authenticator = $connector->getAuthenticator();

    /** @noinspection PhpPossiblePolymorphicInvocationInspection */
    expect(value: $authenticator->prefix)->toBe(expected: 'Authorization') /** @phpstan-ignore-line */
        ->and(value: $authenticator->token)->toBe(expected: "$clientId $token"); /** @phpstan-ignore-line */
})->todo();
