<?php

declare(strict_types=1);

namespace App\Factories;
use App\Handler\AWSAdapterImpl;
use App\Handler\BucketAdapter;
use App\Handler\CloudProvider;
use App\Handler\IAWSClient;
use Aws\S3\S3Client;
use Exception;
use Psr\Container\ContainerInterface;

class BucketAdapterFactory 
{
public function __invoke(ContainerInterface $container): BucketAdapter    {
      
    $provider = $container->get(CloudProvider::class);
        switch($provider){
            case 'Google Cloud Provider':
                //need to update after AWS
                //return new GCPAdapterImpl($provider);
            case 'Amazon Web Services' :
                return new AWSAdapterImpl($container->get(IAWSClient::class));
            default:
                throw new Exception('No valid adapter found');
            // throw exception code 404 if no provider is selected from the list, need to do custom exception here instead after 1st review
        }
    }

}
