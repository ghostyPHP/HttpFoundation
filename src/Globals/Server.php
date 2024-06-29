<?php

namespace Ghosty\Component\HttpFoundation\Globals;

use Ghosty\Component\HttpFoundation\Contracts\Globals\ServerContract;

class Server implements ServerContract
{
    public static function all(): array
    {
        return $_SERVER;
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        return key_exists($key, $_SERVER) ? $_SERVER[$key] : $default;
    }
}
