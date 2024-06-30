<?php

namespace Ghosty\Component\HttpFoundation\Contracts;

interface ResponseContract
{
    public static function create(string $content = "", int $status = 200, array $headers = []): ResponseContract;

    public function sendResponse(): void;

    public function getHeaders(): array;

    public function setHeaders(array $headers): void;

    public function getContent(): string;

    public function setContent(string $content): void;

    public function getStatusCode(): string;

    public function setStatusCode(int $status): void;

    public static function redirect(string $location): void;
}
