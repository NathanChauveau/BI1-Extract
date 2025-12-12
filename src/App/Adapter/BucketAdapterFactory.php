<?php

declare(strict_types=1);

namespace App\Adapter;


use App\Adapter\BucketAdapter;
use App\Adapter\CloudProvider;
use Exception;

class BucketAdapterFactory 
{
public function getAdapter(CloudProvider $provider): BucketAdapter    {
        switch($provider){
            case 'Google Cloud Provider':
                return new GCPAdapterImpl($provider);
            default:
                throw new Exception('No valid adapter found');
            // throw exception code 404 if no provider is selected from the list, need to do custom exception here instead after 1st review
        }
    }

}
