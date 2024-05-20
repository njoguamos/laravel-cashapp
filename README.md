> **warning** This package is still in the early stages of development. DON"T USE IT!
 
# A Laravel package scaffolding Cash App API.

## Why Use this Package?

1. All requests to the Network and Management APIs are automatically [signed](https://developers.cash.app/docs/api/technical-documentation/api-fundamentals/requests/signing-requests).


## Installation

### Installation Method

You can install this package via composer. 

```bash
composer require njoguamos/laravel-cashapp
```

### Migrations
You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-cashapp-migrations"
php artisan migrate
```

### Config 

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-cashapp-config"
```

You need to understand ande the following keys in the environment variables in your application.

| Key                  | type     | required | default | description                                                                                                                                                                                                                                                                                                                                                |
|----------------------|----------|----------|---------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `CASHAPP_PRODUCTION` | `boolen` | `false`  | `false` | Determine if production or staging api should be used. The default is `false` to avoid tampering with production api by accident.                                                                                                                                                                                                                          |
| `CASHAPP_REGION`     | `string` | `false`  | `PDX`   | A character code representing the region closest to where your own services are hosted. Must be [supported regions](https://developers.cash.app/docs/api/technical-documentation/api-fundamentals/requests/regions-and-localization#supported-region--iata-airport-codes). An `InvalidRegionException` exception is thrown if an invalid code is provided. |
| `CASHAPP_CLIENT_ID`  | `string` | `true`   | `null`  | Here you specify the <client_id> associated with your cash app account.                                                                                                                                                                                                                                                                                    |


Example in your `.env`
```dotenv
CASHAPP_PRODUCTION=true
CASHAPP_REGION=ATL #Atlanta, United States
CASHAPP_CLIENT_ID=CS-CI_ACKIl7VOyOUwAg...
```


## Usage

### Responses

All response return by this package are are instance of `Saloon\Http\Response` which has the following keys methods.

| Method                | Description                                                            |
|-----------------------|------------------------------------------------------------------------|
| `$response->ok()`     | Determine if the response code was "OK".                               |
| `$response->body()`   | Get the body of the response as string.                                |
| `$response->status()` | Get the status code of the response.                                   |
| `$response->json()`   | Get the JSON decoded body of the response as an array or scalar value. |
| `$response->xml()`    | Convert the XML response into a SimpleXMLElement.                      |


### 1 Network API

#### 1.1 Brands

<details>
<summary>List Brands </summary>

Get a list of brands matching the given query parameters. [API Reference](https://developers.cash.app/docs/api/network-api%2Foperations%2Flist-brands)

```php
use NjoguAmos\CashApp\CashApp;

# Defaults
$response = CashApp::getBrands();

# With params
$response = CashApp::getBrands(limit: 20);
```

A successful response body `$response->body()` will be formatted as follows.

```json
{
  "brands": [
    {
      "id": "string",
      "name": "string",
      "created_at": "2021-01-01T00:00:00Z",
      "updated_at": "2021-01-01T00:00:00Z",
      "reference_id": "example-id",
      "color": "#ffffff",
      "profile_image_url": "https://franklin-assets.s3.amazonaws.com/merchants/assets/v3/generic/m_category_business.png",
      "metadata": {
        "my-meta": "meta-value"
      }
    }
  ],
  "cursor": "string"
}
```

Query Parameters

| params       | type      | required | default | description                                                                                                                                             |
|--------------|-----------|----------|---------|---------------------------------------------------------------------------------------------------------------------------------------------------------|
| cursor       | `string`  | false    | null    | A pagination cursor returned by a previous call to this endpoint. Provide this cursor to retrieve the next set of results for the original query.       |
| limit        | `integer` | false    | 50      | Maximum number of brands to return. A number `>=1` and `<= 100`                                                                                         |
| reference_id | `string`  | false    | null    | Filters results to only include brands with a `reference_id` matching the given value. The string should be `>= 1` characters and `<= 1024` characters. |

</details>


## Testing

```bash
composer test
```

## Changelog

Please see [releases](https://github.com/njoguamos/laravel-cashapp/releases) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Njogu Amos](https://github.com/njoguamos)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
