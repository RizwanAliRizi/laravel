<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'github' => [
    'client_id' => 'f2b47ff461a07c474375',
    'client_secret' => '93540a7acd1f9af5d116feb18c38a85472a0e679',
    'redirect' => 'http://127.0.0.1:8000/login/github/callback',
    ],


    'google' => [
    'client_id' => '200408105259-snkgluu8g37qmihid8tthu1lck73jb1c.apps.googleusercontent.com',
    'client_secret' => '5Dtq1-faCTLVyxmsSeW5Ddy6',
    'redirect' => 'http://127.0.0.1:8000/login/google/callback',
    ],

];
