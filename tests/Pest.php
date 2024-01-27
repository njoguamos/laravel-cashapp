<?php

use NjoguAmos\CashApp\Tests\TestCase;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Illuminate\Support\Facades\File;
use Saloon\Config;

Config::preventStrayRequests();

uses(TestCase::class)
    ->in(__DIR__);

function mockRequest(string $request, string $jsonFile, int $status = 200, array $headers = []): MockClient
{
    return MockClient::global([
        $request => MockResponse::make(
            body: File::json('tests/fixtures/'.$jsonFile),
            status: $status,
            headers: $headers
        ),
    ]);
}
