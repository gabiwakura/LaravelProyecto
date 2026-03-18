<?php

require __DIR__ . '/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Vercel Serverless Optimization (v2.0)
|--------------------------------------------------------------------------
| FINAL SOLUTION: Overwrite all environment and config to be 100% static.
*/

// Overwrite environment variables before anything else
$overrides = [
    'APP_ENV' => 'production',
    'APP_DEBUG' => 'false',
    'APP_STORAGE' => '/tmp',
    'SESSION_DRIVER' => 'array', // Use 'array' for zero-persistence, zero-database
    'CACHE_STORE' => 'array',
    'DB_CONNECTION' => 'sqlite',
    'DB_DATABASE' => ':memory:',
    'APP_SERVICES_CACHE' => '/tmp/services.php',
    'APP_PACKAGES_CACHE' => '/tmp/packages.php',
    'APP_CONFIG_CACHE' => '/tmp/config.php',
    'APP_ROUTES_CACHE' => '/tmp/routes.php',
];

foreach ($overrides as $key => $value) {
    putenv("$key=$value");
    $_ENV[$key] = $value;
    $_SERVER[$key] = $value;
}

$app = require_once __DIR__ . '/../bootstrap/app.php';

// Force config overrides after boot but before request
$app->booted(function () {
    config([
        'session.driver' => 'array',
        'database.default' => 'sqlite',
        'database.connections.sqlite.database' => ':memory:',
    ]);
});

$app->useStoragePath('/tmp');

foreach (['framework/views', 'framework/sessions', 'framework/cache', 'logs'] as $path) {
    if (!is_dir("/tmp/$path")) {
        mkdir("/tmp/$path", 0755, true);
    }
}

$app->handleRequest(Illuminate\Http\Request::capture());
