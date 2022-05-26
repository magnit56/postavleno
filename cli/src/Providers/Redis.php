<?php

namespace Magnit56\Cli\Providers;

use function Magnit56\Cli\Configuration\conf;
use Predis;

class Redis implements ProviderInterface
{
    protected $client;

    public function __construct()
    {
        $conf = conf('redis');
        $this->client = new Predis\Client($conf);
    }

    public function add(string $key, string $value): bool
    {
        $ttlInSeconds = 3600;
        return $this->client->setex($key, $ttlInSeconds, $value) == 'OK';
    }

    public function delete(string $key): bool
    {
        return boolval($this->client->del($key));
    }
}
