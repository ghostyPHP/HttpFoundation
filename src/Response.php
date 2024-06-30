<?php

namespace Ghosty\Component\HttpFoundation;

use Ghosty\Component\HttpFoundation\Contracts\ResponseContract;

class Response implements ResponseContract
{
    private string $content = "";
    private int $statusCode = 200;
    private array $headers = [];

    public function __construct(string $content = "", int $status = 200, array $headers = [])
    {
        $this->setContent($content);
        $this->setStatusCode($status);
        $this->setHeaders($headers);
    }

    public static function create(string $content = "", int $status = 200, array $headers = []): ResponseContract
    {
        return new self($content, $status, $headers);
    }


    public function sendResponse(): void
    {
        foreach ($this->getHeaders() as $header)
        {
            header($header);
        }

        http_response_code($this->getStatusCode());

        echo $this->getContent();
    }


    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function setHeaders(array $headers): void
    {
        foreach ($headers as $key => $value)
        {
            $this->headers[] = $key . ': ' . $value;
        }
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getStatusCode(): string
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $status): void
    {
        $this->statusCode = $status;
    }

    public static function redirect(string $location): void
    {
        self::create('', 301, ['Location' => $location])->sendResponse();
    }
}
