<?php

namespace Ghosty\Component\HttpFoundation\Contracts;

use Ghosty\Component\HttpFoundation\Contracts\Bags\AttributeBagContract;
use Ghosty\Component\HttpFoundation\Contracts\Bags\CookieBagContract;
use Ghosty\Component\HttpFoundation\Contracts\Bags\FileBagContract;
use Ghosty\Component\HttpFoundation\Contracts\Bags\HeaderBagContract;
use Ghosty\Component\HttpFoundation\Contracts\Bags\InputBagContract;
use Ghosty\Component\HttpFoundation\Contracts\Bags\ServerBagContract;

interface RequestContract
{
    public static function create(): RequestContract;

    public function getBaseUrl(): string;

    public function setBaseUrl(string $baseUrl): void;

    public function getBasePath(): string;

    public function setBasePath(string $basePath): void;

    public function getRequestUri(): string;

    public function setRequestUri(string $requstUri): void;

    public function getMethod(): string;

    public function setMethod(string $method): void;

    public function getAttributes(): AttributeBagContract;

    public function setAttributes(AttributeBagContract $attributeBag): void;

    public function getRequest(): InputBagContract;

    public function setRequest(InputBagContract $requestBag): void;

    public function getQuery(): InputBagContract;

    public function setQuery(InputBagContract $queryBag): void;

    public function getFiles(): FileBagContract;

    public function setFiles(FileBagContract $fileBag): void;

    public function getHeaders(): HeaderBagContract;

    public function setHeaders(HeaderBagContract $headerBag): void;

    public function getServer(): ServerBagContract;

    public function setServer(ServerBagContract $serverBag): void;

    public function getCookies(): CookieBagContract;

    public function setCookies(CookieBagContract $cookieBag): void;
}
