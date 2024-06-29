<?php

namespace Ghosty\Component\HttpFoundation\Globals;

use Ghosty\Component\HttpFoundation\Contracts\Globals\FilesContract;
use Ghosty\Component\HttpFoundation\File\File;

class Files implements FilesContract
{
    public static function all(): array
    {
        $files = [];

        foreach ($_FILES as $name => $file)
        {
            $files[$name] = new File($file['name'], $file['full_path'], $file['type'], $file['tmp_name'], $file['error'], $file['size']);
        }

        return $files;
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        return key_exists($key, $_FILES) ? self::all()[$key] : $default;
    }
}
