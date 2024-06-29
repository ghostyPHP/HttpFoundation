<?php

namespace Ghosty\Component\HttpFoundation\Contracts\Globals;

interface GlobalsContract
{
    public static function all(): array;

    public static function get(string $key, mixed $default = null): mixed;
}
