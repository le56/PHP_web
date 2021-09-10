<?php

return [

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => '202614746161-mhscstokaoseadqftqq91dkh2gtv9hrg.apps.googleusercontent.com',
        'client_secret' => '2seuKEGWqb_-1NeLFskBaJKP',
        'redirect' => 'http://localhost/PHP_web/auth/google/callback',
    ],
    'facebook' => [
        'client_id' => '1616250578580756',
        'client_secret' => '61c224710f0ccc5544346b861b623dd3',
        'redirect' => 'http://localhost/PHP_web/auth/facebook/callback',
    ],
    'github' => [
        'client_id' => 'aeb232331764d557d742',
        'client_secret' => '128c792c305178977e5b16c3469a9063b26a1938',
        'redirect' => 'http://localhost/PHP_web/auth/github/callback',
    ],
];
