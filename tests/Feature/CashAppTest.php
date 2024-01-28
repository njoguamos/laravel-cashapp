<?php

use NjoguAmos\CashApp\CashApp;
use NjoguAmos\CashApp\Requests\Network\Brands\GetBrandsRequest;
use Saloon\Http\Request;
use Saloon\Http\Response;

it(description: 'can successfully get brands from cash app API', closure: function () {
    $mockClient = mockRequest(
        request: GetBrandsRequest::class,
        jsonFile: 'network/list-brands.json'
    );

    /** @noinspection PhpUnhandledExceptionInspection */
    $response = CashApp::getBrands(limit: 5);

    $response->body();

    $mockClient->assertSent(function (Request $request, Response $response) {
        return $request instanceof GetBrandsRequest
            && $response->getPsrRequest()->getUri()->getPath() === '/network/v1/brands';
    });

    $mockClient->assertSentCount(count: 1);
});
