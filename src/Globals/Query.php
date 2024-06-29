<?php

namespace Ghosty\Component\HttpFoundation\Globals;

use Ghosty\Component\HttpFoundation\Contracts\Globals\QueryContract;

class Query implements QueryContract
{
    public static function all(): array
    {
        return $_GET;
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        return key_exists($key, $_GET) ? $_GET[$key] : $default;
    }
}
