<?php

namespace Magnit56\Cli\Providers;

interface ProviderInterface
{
    public function add(string $key, string $value): bool;

    public function delete(string $key): bool;
}