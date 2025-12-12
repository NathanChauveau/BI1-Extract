<?php

declare(strict_types=1);

namespace App\Controllers;

#todo -> check list -> réparer la route vers controller

use App\Services\BucketService;
use Psr\Container\ContainerInterface;

class BucketControllerFactory
# this comment is a reminder of the road of a request -> router to controller to service to interface ("X" Implem. decide by factory) to "X"AdapterImpl to SDK/mock
# do rest of method after 1st livrable
# might need to think how to do the rest of the methods later
{
    public function __invoke(ContainerInterface $container): BucketController
    {
        return new BucketController($container->get(BucketService::class));
    }
}
