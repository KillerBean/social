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
        'region' => 'us-east-1',
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
      'client_id' => 'b9ff3fa86903b3824c76',
      'client_secret' => '0c86510cfcc776b62a2629d8200c2311fbc5fa02',
      'redirect' => 'http://social.dev/auth/github/callback',
    ],

    'twitter' => [
      'client_id' => 'Bo9VK0vP26goJRG3Ca0GfRRbU',
      'client_secret' => 'uhTdVSZ9dF8cXvMaVi8Ea4GiSEVbCMvzcQ31emah1REA5fuugT',
      'redirect' => 'http://social.dev/auth/twitter/callback',
    ],

    'google' => [
      'client_id' => '353588379859-il02roh3q6ek917n9rg22ggn6dsn32j4.apps.googleusercontent.com',
      'client_secret' => 'YQ52nYqTA0_Q898ZvtR4fohm',
      'redirect' => 'http://social.dev/auth/google/callback',
    ],

];
