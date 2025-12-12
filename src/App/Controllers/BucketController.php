<?php

declare(strict_types=1);

namespace App\Controllers;

#todo -> check list -> réparer la route vers controller

use App\Services\BucketService;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use \Psr\Http\Message\ResponseInterface;

class BucketController implements RequestHandlerInterface
# this comment is a reminder of the road of a request -> router to controller to service to interface ("X" Implem. decide by factory) to "X"AdapterImpl to SDK/mock
# do rest of method after 1st livrable
# might need to think how to do the rest of the methods later
{
   /* private BucketService $service;


    public function __construct(BucketService $service)
    {
        $this->service = $service;
    }*/
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        /*$remoteSrc = $request->getQueryParams()['remoteSrc'];
        return $this->listObjects($remoteSrc);*/
        return new JsonResponse(['status' => 'ok']);
    }

  /*  public function listObjects(string $remoteSrc)
    {
        $result = $this->service->list($remoteSrc);

        return $result;
    }*/
}
