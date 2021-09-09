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
];
