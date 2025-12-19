<?php

declare(strict_types=1);

namespace App\Controllers;

#todo -> current step : $service injection in controller without calling listObjects | next step : be able to call service from controller

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use \Psr\Http\Message\ResponseInterface;

class BucketController implements RequestHandlerInterface
# this comment is a reminder of the road of a request -> router to controller to service to interface ("X" Implem. decide by factory) to "X"AdapterImpl to SDK/mock
# do rest of method after 1st livrable
# might need to think how to do the rest of the methods later
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        //
        /*$remoteSrc = $request->getQueryParams()['remoteSrc'];
        return $this->listObjects($remoteSrc);*/
        return new JsonResponse(['status' => 'ok']);
    }

    public function listObjects(string $remoteSrc)
    {
       /*$result = $this->service->list($remoteSrc);

        return $result;*/
    }
}
