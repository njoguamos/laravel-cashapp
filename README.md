# A laravel package scaffolding Cash App API.

- [ ] Add description


## Installation

### Installation Method

This package is not public. You can install the package by updating your project composer as follows. 

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/njoguamos/laravel-cashapp.git"
        }
    ],
    "require": {
        "njoguamos/laravel-cashapp": "dev-master"
    }
}
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

You need to understand the following keys in the config

| Key                  | type     | required | default | description                                                                                                                                                                                                                                                                                                                                                |
|----------------------|----------|----------|---------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `CASHAPP_PRODUCTION` | `boolen` | `false`  | `false` | Determine if production or staging api should be used. The default is `false` to avoid tampering with production api by accident.                                                                                                                                                                                                                          |
| `CASHAPP_REGION`     | `string` | `false`  | `PDX`   | A character code representing the region closest to where your own services are hosted. Must be [supported regions](https://developers.cash.app/docs/api/technical-documentation/api-fundamentals/requests/regions-and-localization#supported-region--iata-airport-codes). An `InvalidRegionException` exception is thrown if an invalid code is provided. |

## Usage

### 1 Network API

#### 1.1 Brands

<details>
<summary>List Brands </summary>

Get a list of brands matching the given query parameters. [API Reference](https://developers.cash.app/docs/api/network-api%2Foperations%2Flist-brands)

```php
use NjoguAmos\CashApp\CashApp;

# Defaults
$brands = CashApp::listBrands();

# With params
$brands = CashApp::listBrands(limit: 20);
```

A successful response will be formatted as follows.

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
