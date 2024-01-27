<?php

namespace NjoguAmos\CashApp\Requests\Network\Brands;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class ListBrandsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/networks/brands';
    }
}
