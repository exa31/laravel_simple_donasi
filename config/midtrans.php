<?php

use \Midtrans\Config;

return [
        // Set your Merchant Server Key
    Config::$serverKey = env('SERVER_KEY_MIDTRANS'),
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    Config::$isProduction = false,
        // Set sanitization on (default)
    Config::$isSanitized = true,
        // Set 3DS transaction for credit card to true
    Config::$is3ds = true,

    Config::$paymentIdempotencyKey = "Unique-ID",

];