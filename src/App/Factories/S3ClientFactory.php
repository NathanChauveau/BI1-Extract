<?php

declare(strict_types=1);

namespace App\Factories;

use Aws\S3\S3Client;
use Psr\Container\ContainerInterface;

class S3ClientFactory
{
    public function __invoke(ContainerInterface $container): S3Client
    {
        $config = $container->get('config')['aws'];

        return new S3Client([
            'region' => $config['region'],
            'version' => $config['version'],
            'credentials' => $config['credentials']
        ]);
    }
}
