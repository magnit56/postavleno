<?php

namespace Magnit56\Cli\Providers;

class Memcached implements ProviderInterface
{
    public function add(string $key, string $value): bool
    {
//        Заглушка
        return boolval(rand(0, 1));
    }

    public function delete(string $key): bool
    {
//        Заглушка
        return boolval(rand(0, 1));
    }
}
