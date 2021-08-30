<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default er
    |--------------------------------------------------------------------------
    |
    | This option controls the default er that is used to send any e
    | messages sent by your application. Alternative ers may be setup
    | and used as needed; however, this er will be used by default.
    |
    */

    'default' => env('_ER', 'smtp'),

    /*
    |--------------------------------------------------------------------------
    | er Configurations
    |--------------------------------------------------------------------------
    |
    | Here you may configure all of the ers used by your application plus
    | their respective settings. Several examples have been configured for
    | you and you are free to add your own as your application requires.
    |
    | Laravel supports a variety of  "transport" drivers to be used while
    | sending an e-. You will specify which one you are using for your
    | ers below. You are free to add additional ers as required.
    |
    | Supported: "smtp", "send", "gun", "ses",
    |            "postmark", "log", "array"
    |
    */

    'ers' => [
        'smtp' => [
            'transport' => 'smtp',
            'host' => env('_HOST', 'smtp.gun.org'),
            'port' => env('_PORT', 587),
            'encryption' => env('_ENCRYPTION', 'tls'),
            'username' => env('_USERNAME'),
            'password' => env('_PASSWORD'),
            'timeout' => null,
            'auth_mode' => null,
        ],

        'ses' => [
            'transport' => 'ses',
        ],

        'gun' => [
            'transport' => 'gun',
        ],

        'postmark' => [
            'transport' => 'postmark',
        ],

        'send' => [
            'transport' => 'send',
            'path' => '/usr/sbin/send -bs',
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
    | You may wish for all e-s sent by your application to be sent from
    | the same address. Here, you may specify a name and address that is
    | used globally for all e-s that are sent by your application.
    |
    */

    'from' => [
        'address' => env('_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('_FROM_NAME', 'Example'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Markdown  Settings
    |--------------------------------------------------------------------------
    |
    | If you are using Markdown based e rendering, you may configure your
    | theme and component paths here, allowing you to customize the design
    | of the es. Or, you may simply stick with the Laravel defaults!
    |
    */

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

];
