<?php

namespace Ghosty\Component\HttpFoundation\Bags;

use Ghosty\Component\HttpFoundation\Contracts\Bags\ParameterBagContract;

abstract class ParameterBag implements ParameterBagContract
{
    private array $parameters = [];

    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }


    public function all(): array
    {
        return $this->parameters;
    }


    public function get(string $key, mixed $default = null): mixed
    {
        return key_exists($key, $this->parameters) ? $this->parameters[$key] : $default;
    }


    public function set(string $key, mixed $value): void
    {
        $this->parameters[$key] = $value;
    }


    public function has(string $key): bool
    {
        return key_exists($key, $this->parameters);
    }
}
