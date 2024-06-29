<?php

namespace Ghosty\Component\HttpFoundation\File;

class File
{
    public string $name;
    public string $fullPath;
    public string $type;
    public string $tempName;
    public int $error;
    public int $size;

    public function __construct(string $name, string $fullPath, string $type, string $tempName, int $error, int $size)
    {
        $this->name = $name;
        $this->fullPath = $fullPath;
        $this->type = $type;
        $this->tempName = $tempName;
        $this->error = $error;
        $this->size = $size;
    }
}
