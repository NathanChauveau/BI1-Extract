<?php

declare(strict_types=1);

namespace App\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Server\MiddlewareInterface;
use Laminas\Diactoros\Response\JsonResponse;

class BucketAdapterFactory implements MiddlewareInterface
{
    public getAdapter(CloudProvider $provider): BucketAdapter
    {

    }

}
