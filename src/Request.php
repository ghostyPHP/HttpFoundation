<?php

namespace Ghosty\Component\HttpFoundation;

use Ghosty\Component\HttpFoundation\Bags\AttributeBag;
use Ghosty\Component\HttpFoundation\Bags\CookieBag;
use Ghosty\Component\HttpFoundation\Bags\FileBag;
use Ghosty\Component\HttpFoundation\Bags\HeaderBag;
use Ghosty\Component\HttpFoundation\Bags\InputBag;
use Ghosty\Component\HttpFoundation\Bags\ServerBag;
use Ghosty\Component\HttpFoundation\Contracts\Bags\AttributeBagContract;
use Ghosty\Component\HttpFoundation\Contracts\Bags\CookieBagContract;
use Ghosty\Component\HttpFoundation\Contracts\Bags\FileBagContract;
use Ghosty\Component\HttpFoundation\Contracts\Bags\HeaderBagContract;
use Ghosty\Component\HttpFoundation\Contracts\Bags\InputBagContract;
use Ghosty\Component\HttpFoundation\Contracts\Bags\ServerBagContract;
use Ghosty\Component\HttpFoundation\Contracts\RequestContract;
use Ghosty\Component\HttpFoundation\Globals\Cookies;
use Ghosty\Component\HttpFoundation\Globals\Files;
use Ghosty\Component\HttpFoundation\Globals\Headers;
use Ghosty\Component\HttpFoundation\Globals\Query;
use Ghosty\Component\HttpFoundation\Globals\Request as GlobalsRequest;
use Ghosty\Component\HttpFoundation\Globals\Server;

class Request implements RequestContract
{
    private AttributeBagContract $attributes;

    private InputBagContract $request;

    private InputBagContract $query;

    private FileBagContract $files;

    private HeaderBagContract $headers;

    private ServerBagContract $server;

    private CookieBagContract $cookies;


    private string $baseUrl;
    private string $basePath;
    private string $requestUri;
    private string $method;

    public function __construct()
    {
        $this->setBags();
        $this->setFields();
    }


    public static function create(): RequestContract
    {
        return new self;
    }


    private function setFields()
    {
        $this->setBaseUrl(Server::get('SERVER_NAME', 'localhost') . Server::get('SERVER_PORT', '8000'));
        $this->setBasePath(Server::get('DOCUMENT_ROOT', '/'));
        $this->setRequestUri(Server::get('REQUEST_URI', '/'));
        $this->setMethod(Server::get('REQUEST_METHOD', 'GET'));
    }

    private function setBags()
    {
        $this->setAttributes(new AttributeBag([]));
        $this->setQuery(new InputBag(Query::all()));
        $this->setRequest(new InputBag(GlobalsRequest::all()));
        $this->setServer(new ServerBag(Server::all()));
        $this->setFiles(new FileBag(Files::all()));
        $this->setHeaders(new HeaderBag(Headers::all()));
        $this->setCookies(new CookieBag(Cookies::all()));
    }

    public function getBasePath(): string
    {
        return $this->basePath;
    }

    public function setBasePath(string $basePath): void
    {
        $this->basePath = $basePath;
    }

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function setBaseUrl(string $baseUrl): void
    {
        $this->baseUrl = $baseUrl;
    }

    public function getRequestUri(): string
    {
        return $this->requestUri;
    }

    public function setRequestUri(string $requstUri): void
    {
        $this->requestUri = $requstUri;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    public function getAttributes(): AttributeBagContract
    {
        return $this->attributes;
    }

    public function setAttributes(AttributeBagContract $attributeBag): void
    {
        $this->attributes = $attributeBag;
    }

    public function getRequest(): InputBagContract
    {
        return $this->request;
    }

    public function setRequest(InputBagContract $requestBag): void
    {
        $this->request = $requestBag;
    }

    public function getQuery(): InputBagContract
    {
        return $this->query;
    }

    public function setQuery(InputBagContract $queryBag): void
    {
        $this->query = $queryBag;
    }

    public function getFiles(): FileBagContract
    {
        return $this->files;
    }

    public function setFiles(FileBagContract $fileBag): void
    {
        $this->files = $fileBag;
    }

    public function getHeaders(): HeaderBagContract
    {
        return $this->headers;
    }

    public function setHeaders(HeaderBagContract $headerBag): void
    {
        $this->headers = $headerBag;
    }

    public function getServer(): ServerBagContract
    {
        return $this->server;
    }

    public function setServer(ServerBagContract $serverBag): void
    {
        $this->server = $serverBag;
    }

    public function getCookies(): CookieBagContract
    {
        return $this->cookies;
    }

    public function setCookies(CookieBagContract $cookieBag): void
    {
        $this->cookies = $cookieBag;
    }
}
