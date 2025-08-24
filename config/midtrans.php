<?php

return [
    'serverkey' => env('MIDTRANS_SERVER_KEY'),
    'clientkey' => env('MIDTRANS_CLIENT_KEY'),
    'isproduction' => env('MIDTRANS_IS_PRODUCTION', false),
    'issanitized' => true,
    'is3ds' => true,
];
