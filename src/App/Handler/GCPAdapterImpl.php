<?php

declare(strict_types=1);

namespace App\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Server\MiddlewareInterface;
use Laminas\Diactoros\Response\JsonResponse;
use App\Handler\BucketAdapter;

class GCPAdapterImpl implements BucketAdapter 
{
    public function upload(string $localSrc, string $remoteSrc): void
    {

    }

    public function download(string $localSrc, string $remoteSrc): void
    {

    }
    public function delete(string $remoteSrc, bool $recursive): void
    {

    }
    public function list(string $remoteSrc): string[]
    {

    }

}
