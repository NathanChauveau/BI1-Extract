<?php

declare(strict_types=1);

namespace App\Controllers;

#todo -> check list -> réparer la route vers controller

use App\Services\BucketService;
use Psr\Http\Message\ServerRequestInterface;

class BucketController  
# this comment is a reminder of the road of a request -> router to controller to service to interface ("X" Implem. decide by factory) to "X"AdapterImpl to SDK/mock
# do rest of method after 1st livrable
{
    private BucketService $service;

    public function __construct(BucketService $service){
        $this->service = $service;
    }
    public function listObjects(ServerRequestInterface $request)
    {
        $remoteSrc = $request->getQueryParams()['remoteSrc'];
        $result = $this->service->list($remoteSrc);

        return $result;
    }
}
