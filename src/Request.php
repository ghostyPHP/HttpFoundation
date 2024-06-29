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
    public AttributeBagContract $attributes;

    public InputBagContract $request;

    public InputBagContract $query;

    public FileBagContract $files;

    public HeaderBagContract $headers;

    public ServerBagContract $server;

    public CookieBagContract $cookies;


    private string $baseUrl;
    private string $basePath;
    private string $requestUri;
    private string $method;

    public function __construct()
    {
    }


    public function create(): RequestContract
    {
        $this->init();

        return $this;
    }

    private function init()
    {
        $this->setAttributes([]);
        $this->setQuery();
        $this->setRequest();
        $this->setServer();
        $this->setFiles();
        $this->setHeaders();
        $this->setCookies();
    }

    private function setAttributes(array $attributes)
    {
        $this->attributes = new AttributeBag($attributes);
    }

    private function setQuery()
    {
        $this->query = new InputBag(Query::all());
    }

    private function setRequest()
    {
        $this->request = new InputBag(GlobalsRequest::all());
    }

    private function setServer()
    {
        $this->server = new ServerBag(Server::all());
    }

    private function setFiles()
    {
        $this->files = new FileBag(Files::all());
    }

    private function setHeaders()
    {
        $this->headers = new HeaderBag(Headers::all());
    }

    private function setCookies()
    {
        $this->cookies = new CookieBag(Cookies::all());
    }
}
