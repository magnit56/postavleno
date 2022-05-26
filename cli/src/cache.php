<?php

namespace Cli;

use Docopt;
use Exception;
use Magnit56\Cli\Providers\Memcached;
use Magnit56\Cli\Providers\Redis;

function cache(string $providerName, string $operationName, array $options): bool
{
    $providers = [
        'redis' => Redis::class,
        'memcached' => Memcached::class,
    ];
    $provider = new $providers[$providerName];

    switch ($operationName) {
        case 'add':
            $key = $options['key'];
            $value = $options['value'];
            return $provider->add($key, $value);
        case 'delete':
            $key = $options['key'];
            return $provider->delete($key);
    }
}
