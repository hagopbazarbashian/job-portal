<?php
/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

 return [
    'mode' => env('PAYPAL_MODE', 'sandbox'),

    'sandbox' => [
        'username' => env('PAYPAL_SANDBOX_API_USERNAME'),
        'password' => env('PAYPAL_SANDBOX_API_PASSWORD'),
        'secret' => env('PAYPAL_SANDBOX_API_SECRET'),
        'certificate' => env('PAYPAL_SANDBOX_API_CERTIFICATE'),
        'app_id' => env('PAYPAL_SANDBOX_APP_ID'),
        'client_id' => env('PAYPAL_SANDBOX_CLIENT_ID'),
        'client_secret' => env('PAYPAL_SANDBOX_CLIENT_SECRET'),
    ],

    'live' => [
        'username' => env('PAYPAL_LIVE_API_USERNAME'),
        'password' => env('PAYPAL_LIVE_API_PASSWORD'),
        'secret' => env('PAYPAL_LIVE_API_SECRET'),
        'certificate' => env('PAYPAL_LIVE_API_CERTIFICATE'),
        'app_id' => env('PAYPAL_LIVE_APP_ID'),
        'client_id' => env('PAYPAL_LIVE_CLIENT_ID')
    ],

    // Other configuration options...
];
