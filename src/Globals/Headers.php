<?php

namespace Ghosty\Component\HttpFoundation\Globals;

use Ghosty\Component\HttpFoundation\Contracts\Globals\HeadersContract;

class Headers implements HeadersContract
{
    public static function all(): array
    {
        return getallheaders();
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        return key_exists($key, getallheaders()) ? getallheaders()[$key] : $default;
    }
}
