# diego-rlima/laravel-cors
Simple package to add CORS (Cross-Origin Resource Sharing) headers to the Laravel application.

## Requirements
This package requires **Laravel 5.5 or later** and **PHP 7.0.0 or later**.

## Installation
```bash
$ composer require diego-rlima/laravel-cors
```

## Global usage
To allow CORS for all your routes, add the `CorsMiddleware` in the `$middleware` property of `app/Http/Kernel.php` class:

```php
protected $middleware = [
    // ...
    \DRL\LaravelCors\CorsMiddleware::class,
];
```

## Group middleware
You can also allow CORS in a specific middleware group. Just add the `CorsMiddleware` to your group:

```php
protected $middlewareGroups = [
    'web' => [
       // ...
    ],

    'api' => [
        // ...
        \DRL\LaravelCors\CorsMiddleware::class,
    ],
];
```

## Configuration
The defaults are set in `config/cors.php`. Get a copy of this file to your own config directory to modify the settings.

Publish the config using the following command:

```sh
$ php artisan vendor:publish --provider="DRL\LaravelCors\CorsServiceProvider"
```

> **Note:** If you are explicitly whitelisting headers, you must include `Origin` or requests will fail to be recognized as CORS.


```php
return [

    /*
    |----------------------------------------------------------------------
    | Access-Control-Allow-Origin
    |----------------------------------------------------------------------
    |
    | This response header specifies the method or methods allowed when
    | accessing the resource in response to a preflight request.
    |
    */

    'allow_origins' => [
        '*',
    ],

    /*
    |----------------------------------------------------------------------
    | Access-Control-Allow-Methods
    |----------------------------------------------------------------------
    |
    | This response header specifies the method or methods allowed when
    | accessing the resource in response to a preflight request.
    |
    */

    'allow_methods' => [
        'POST',
        'GET',
        'OPTIONS',
        'PATCH',
        'PUT',
        'DELETE',
    ],

    /*
    |----------------------------------------------------------------------
    | Access-Control-Allow-Headers
    |----------------------------------------------------------------------
    |
    | This response header is used in response to a preflight request to
    | indicate which HTTP headers can be used during the actual request.
    |
    */

    'allow_headers' => [
        'Content-Type',
        'X-Auth-Token',
        'Origin',
        'Authorization',
    ],

    /*
    |----------------------------------------------------------------------
    | Access-Control-Expose-Headers
    |----------------------------------------------------------------------
    |
    | This response header indicates which headers can be exposed as part
    | of the response by listing their names.
    |
    */

    'expose_headers' => [
        'Cache-Control',
        'Content-Language',
        'Content-Type',
        'Expires',
        'Last-Modified',
        'Pragma',
    ],

    /*
    |----------------------------------------------------------------------
    | Access-Control-Max-Age
    |----------------------------------------------------------------------
    |
    | This response header indicates how long the results of a preflight
    | request can be cached.
    |
    */

    'max_age' => 60 * 60 * 24,
]
```

The values of `allow_origins`, `allow_methods`, `allow_headers` and `expose_headers` can be set to `array('*')` to accept any value.

## License

Released under the MIT License, see [LICENSE](LICENSE).
