<?php

namespace Ghosty\Component\HttpFoundation\Contracts\Bags;

interface ParameterBagContract
{
    public function all(): array;

    public function get(string $key, mixed $default = null): mixed;

    public function set(string $key, mixed $value): void;

    public function has(string $key): bool;
}
