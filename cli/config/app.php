<?php

namespace Magnit56\Cli\Configuration;

function conf(string $provider)
{
    $conf = [
        'redis' => [
            'host' => 'redis',
            'port' => '6379',
        ],
        'memcached' => [
            'host' => 'memcached',
            'port' => '11211',
        ],
    ];
    if (isset($conf[$provider])) {
        return $conf[$provider];
    } else {
        throw new \Exception('Нет такого провайдера');
    }
}
