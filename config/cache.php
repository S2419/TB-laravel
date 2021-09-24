<?php

<<<<<<< HEAD
use Illuminate\Support\Str;

=======
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
return [

    /*
    |--------------------------------------------------------------------------
    | Default Cache Store
    |--------------------------------------------------------------------------
    |
    | This option controls the default cache connection that gets used while
    | using this caching library. This connection is used when another is
    | not explicitly specified when executing a given caching function.
    |
<<<<<<< HEAD
=======
    | Supported: "apc", "array", "database", "file", "memcached", "redis"
    |
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
    */

    'default' => env('CACHE_DRIVER', 'file'),

    /*
    |--------------------------------------------------------------------------
    | Cache Stores
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the cache "stores" for your application as
    | well as their drivers. You may even define multiple stores for the
    | same cache driver to group types of items stored in your caches.
    |
<<<<<<< HEAD
    | Supported drivers: "apc", "array", "database", "file",
    |         "memcached", "redis", "dynamodb", "octane", "null"
    |
=======
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
    */

    'stores' => [

        'apc' => [
            'driver' => 'apc',
        ],

        'array' => [
            'driver' => 'array',
<<<<<<< HEAD
            'serialize' => false,
=======
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
        ],

        'database' => [
            'driver' => 'database',
            'table' => 'cache',
            'connection' => null,
<<<<<<< HEAD
            'lock_connection' => null,
=======
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
        ],

        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache/data'),
        ],

        'memcached' => [
            'driver' => 'memcached',
            'persistent_id' => env('MEMCACHED_PERSISTENT_ID'),
            'sasl' => [
                env('MEMCACHED_USERNAME'),
                env('MEMCACHED_PASSWORD'),
            ],
            'options' => [
<<<<<<< HEAD
                // Memcached::OPT_CONNECT_TIMEOUT => 2000,
=======
                // Memcached::OPT_CONNECT_TIMEOUT  => 2000,
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
            ],
            'servers' => [
                [
                    'host' => env('MEMCACHED_HOST', '127.0.0.1'),
                    'port' => env('MEMCACHED_PORT', 11211),
                    'weight' => 100,
                ],
            ],
        ],

        'redis' => [
            'driver' => 'redis',
<<<<<<< HEAD
            'connection' => 'cache',
            'lock_connection' => 'default',
        ],

        'dynamodb' => [
            'driver' => 'dynamodb',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'table' => env('DYNAMODB_CACHE_TABLE', 'cache'),
            'endpoint' => env('DYNAMODB_ENDPOINT'),
        ],

        'octane' => [
            'driver' => 'octane',
=======
            'connection' => 'default',
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Cache Key Prefix
    |--------------------------------------------------------------------------
    |
    | When utilizing a RAM based store such as APC or Memcached, there might
    | be other applications utilizing the same cache. So, we'll specify a
    | value to get prefixed to all our keys so we can avoid collisions.
    |
    */

<<<<<<< HEAD
    'prefix' => env('CACHE_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_cache'),
=======
    'prefix' => 'laravel',
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb

];
