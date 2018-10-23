<?php

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
];
