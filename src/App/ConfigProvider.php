<?php

declare(strict_types=1);

namespace App;

use App\Factories\AWSClientFactory;
use App\Handler\GCPAdapterImpl;
use AppTest\Adapter\BucketImplTestGCP;
use AppTest\Handler\AWSBucketAdapterImplTest;
use App\Handler\AWSAdapterImpl;
use App\Handler\BucketAdapter;
use App\Factories\BucketAdapterFactory;
use App\Factories\S3ClientFactory;
use App\Handler\AWSClient;
use Aws\S3\S3Client;

# Will might need it later, ignore for 1st livrable

/**
 * The configuration provider for the App module
 *
 * @see https://docs.laminas.dev/laminas-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     */
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
        ];
    }

    /**
     * Returns the container dependencies
     */
    public function getDependencies(): array
    {
        return [
            'invokables' => [
                //Handler\PingHandler::class => Handler\PingHandler::class,
                GCPAdapterImpl::class => BucketImplTestGCP::class,
                AWSAdapterImpl::class => AWSBucketAdapterImplTest::class
            ],
            'factories'  => [
                //Handler\HomePageHandler::class => Handler\HomePageHandlerFactory::class,
                BucketAdapter::class => BucketAdapterFactory::class,
                S3Client::class => S3ClientFactory::class,
                AWSClient::class => AWSClientFactory::class
            ],
        ];
    }

    /**
     * Returns the templates configuration
     */
    public function getTemplates(): array
    {
        return [
            'paths' => [
                'app'    => ['templates/app'],
                'error'  => ['templates/error'],
                'layout' => ['templates/layout'],
            ],
        ];
    }
}
