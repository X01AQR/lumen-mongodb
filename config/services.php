<?php

return [
'stripe' => [
        'model' => App\Models\User::class, // changed
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
];
