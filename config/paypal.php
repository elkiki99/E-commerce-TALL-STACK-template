<?php

return [
    'base_url' => env('PAYPAL_MODE', 'sandbox') === 'live' ? 'https://api-m.paypal.com' : 'https://api.m.sandbox.paypal.com',
    'mode' => env('PAYPAL_MODE'),
    'client_id' => env('PAYPAL_CLIENT_ID'),
    'client_secret' => env('PAYPAL_CLIENT_SECRET'),
    'currency' => env('PAYPAL_CURRENCY', 'GBP'),
];

// return [
//     'mode'    => env('PAYPAL_MODE', 'sandbox'),
//     'sandbox' => [
//         'client_id'         => env('PAYPAL_CLIENT_ID', ''),
//         'client_secret'     => env('PAYPAL_CLIENT_SECRET', ''),
//         'app_id'            => '',
//     ],
//     // 'live' => [
//     //     'client_id'         => env('PAYPAL_LIVE_CLIENT_ID', ''),
//     //     'client_secret'     => env('PAYPAL_LIVE_CLIENT_SECRET', ''),
//     //     'app_id'            => '',
//     // ],

//     'payment_action' => 'Sale',
//     'currency'       => env('PAYPAL_CURRENCY', 'USD'),
//     'notify_url'     => '',
//     'locale'         => '',
//     'validate_ssl'   => true,
// ];