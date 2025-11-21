<?php

namespace App\Handler;

use Psr\Container\ContainerInterface;

class HelloHandlerFactory
{
    public function __invoke(ContainerInterface $container): HelloHandler
    {
        // Tu peux injecter ici des services, config, etc.
        $config = $container->get('config')['app'] ?? [];
        $serviceName = $config['name'] ?? 'default-service';

        return new HelloHandler($serviceName);
    }
}