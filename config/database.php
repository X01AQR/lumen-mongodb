<?php

return [

    'default' => 'mongodb',

    'connections' => [

        'mongodb' => array(
            'driver'   => 'mongodb',
            'host'     => env('DB_HOST'),
            'port'     => env('DB_PORT', 27017),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'database' => env('DB_DATABASE')
        ),

    ],

    'migrations' => 'migrations',
];
