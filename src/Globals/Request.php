<?php

namespace Ghosty\Component\HttpFoundation\Globals;

use Ghosty\Component\HttpFoundation\Contracts\Globals\RequestContract;

class Request implements RequestContract
{
    public static function all(): array
    {
        return $_POST;
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        return key_exists($key, $_POST) ? $_POST[$key] : $default;
    }
}
