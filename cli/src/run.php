<?php

namespace Cli;

use Docopt;
use Exception;

function run(string $doc): void
{
    try {
        $args = Docopt::handle($doc, ['version' => 'Version 1.0']);
        if ($args['redis']) {
            $provider = 'redis';
        } elseif ($args['memcached']) {
            $provider = 'memcached';
        }

        if ($args['add']) {
            $operation = 'add';
            $options = [
                'key' => $args['<key>'],
                'value' => $args['<value>'],
            ];
        } elseif ($args['delete']) {
            $operation = 'delete';
            $options = [
                'key' => $args['<key>']
            ];
        }
        $output = cache($provider, $operation, $options) ? 'true' : 'false';
    } catch (Exception $exception) {
        $output = $exception->getMessage();
    }
    print_r(PHP_EOL);
    print_r($output);
    print_r(PHP_EOL);
}
