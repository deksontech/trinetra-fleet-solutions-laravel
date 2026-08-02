<?php

return [
    'default' => env('CACHE_STORE', 'database'),
    'stores' => [
        'database' => ['driver' => 'database', 'connection' => null, 'table' => 'cache', 'lock_connection' => null, 'lock_table' => 'cache_locks'],
        'file' => ['driver' => 'file', 'path' => storage_path('framework/cache/data')],
    ],
    'prefix' => env('CACHE_PREFIX', 'trinetra_fleet_solutions_cache_'),
];
