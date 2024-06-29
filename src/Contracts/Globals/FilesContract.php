<?php

namespace Ghosty\Component\HttpFoundation\Contracts\Globals;

use Ghosty\Component\HttpFoundation\File\File;

interface FilesContract extends GlobalsContract
{
    /**
     * @return File[]
     */
    public static function all(): array;

    /**
     * @return File
     */
    public static function get(string $key, mixed $default = null): mixed;
}
