<?php

declare(strict_types=1);

namespace App\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Server\MiddlewareInterface;
use Laminas\Diactoros\Response\JsonResponse;

class BucketService implements MiddlewareInterface 
{
    private BucketAdapter $adapter;

    public function __construct(CloudProvider $provider)
    {
        $this->provider = $provider;
    }

    public function download(): ResponseInterface
    {

    }

    public function delete(): ResponseInterface
    {

    }

    public function list(): ResponseInterface
    {

    }

    public function upload(): ResponseInterface
    {

    }
}
