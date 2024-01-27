<?php

namespace NjoguAmos\CashApp;

use NjoguAmos\CashApp\Connectors\CashAppConnector;
use NjoguAmos\CashApp\Requests\Network\Brands\ListBrandsRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class CashApp
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public static function listBrands(string $cursor = null, int $limit = 50, $reference_id = null): string
    {
        $connector = new CashAppConnector();

        $request = new ListBrandsRequest();

        if ($cursor) {
            $request->query()->add('cursor', $cursor);
        }

        if ($reference_id) {
            $request->query()->add('reference_id', $reference_id);
        }

        $request->query()->add('limit', $limit);

        return $connector->send($request)->body();
    }
}
