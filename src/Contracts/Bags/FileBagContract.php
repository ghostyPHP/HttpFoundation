<?php

namespace Ghosty\Component\HttpFoundation\Contracts\Bags;

use Ghosty\Component\HttpFoundation\File\File;

interface FileBagContract extends ParameterBagContract
{
    /**
     *
     * @return File[]
     */
    public function all(): array;

    /**
     *
     * @return File
     */
    public function get(string $key, mixed $default = null): mixed;
}
