<?php

return [

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],

        'pelanggan' => [ // New guard for pelanggan
            'driver' => 'session',
            'provider' => 'pelanggans',
        ],

    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],

        'pelanggans' => [ // New provider for pelanggans
            'driver' => 'eloquent',
            'model' => App\Models\Pelanggan::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    'pelanggans' => [ // Password reset for pelanggans
            'provider' => 'pelanggans',
            'table' => 'password_resets_pelanggans', // Adjust table name if needed
            'expire' => 60,
            'throttle' => 60,
        ],    
    ],

    'password_timeout' => 10800,
];
