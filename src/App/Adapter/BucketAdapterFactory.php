<?php

declare(strict_types=1);

namespace App\Adapter;


use App\Adapter\BucketAdapter;
use AppTest\Adapter\CloudProvider;
use Exception;

class BucketAdapterFactory 
{
public function getAdapter(CloudProvider $provider): BucketAdapter    {
        switch($provider){
            case 'gcp':
                return new GCPAdapterImpl($provider);
            default:
                throw new Exception('No valid adapter found');
            // throw exception if no provider is selected from the list, need to do custom exception here instead after 1st review
        }
    }

}
