<?php

namespace Ghosty\Component\HttpFoundation\Globals;

use Ghosty\Component\HttpFoundation\Contracts\Globals\CookiesContract;

class Cookies implements CookiesContract
{
    public static function all(): array
    {
        return $_COOKIE;
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        return key_exists($key, $_COOKIE) ? $_COOKIE[$key] : $default;
    }
}
