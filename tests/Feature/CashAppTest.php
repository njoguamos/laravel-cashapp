<?php

use NjoguAmos\CashApp\CashApp;
use NjoguAmos\CashApp\Requests\Network\Brands\ListBrandsRequest;

it(description: 'can successfully get brands from cash app API', closure: function () {
    $mockClient = $this->mockRequest(
        request: ListBrandsRequest::class,
        jsonFile: 'network/list-brands.json'
    );

    /** @noinspection PhpUnhandledExceptionInspection */
    $brands = CashApp::listBrands();

    $mockClient->assertSent(value: ListBrandsRequest::class);

    $mockClient->assertSentCount(count: 1);
});
