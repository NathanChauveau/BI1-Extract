<?php

declare(strict_types=1);

namespace App\Factories;

use Aws\S3\S3Client;
use Psr\Container\ContainerInterface;
use App\Handler\AWSClient;

class AWSClientFactory
{
    public function __invoke(ContainerInterface $container): AWSClient
    {
        $config = $container->get('config')['aws'];

        return new AWSClient($container->get(S3Client::class), $config['bucket']);
    }
}
