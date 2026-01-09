<?php

declare(strict_types=1);

namespace App\Controllers;

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use \Psr\Http\Message\ResponseInterface;
use App\Services\BucketService;
 

class ListObject implements RequestHandlerInterface
# this comment is a reminder of the road of a request -> router to controller to service to interface ("X" Implem. decide by factory) to "X"AdapterImpl to SDK/mock
# do rest of method after 1st livrable
# might need to think how to do the rest of the methods later
{
    public function __construct(private BucketService $bucketService) {}

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        //in WIP to get remoteSrc's data

       // return $this->listObjects($remoteSrc);*/
        return new JsonResponse(['status' => 'test']);
    }

    public function listObjects(string $remoteSrc)
    {
        $this->bucketService->list($remoteSrc);
    }
}
