<?php

declare(strict_types=1);

namespace App\Handler;


use App\Handler\DriveAdapter;
use AppTest\Handler\CloudProvider;
use Exception;

class DriveAdapterFactory 
{
public function getAdapter(CloudProvider $provider): DriveAdapter    {
        switch($provider){
            case 'gcp':
                return new GCPAdapterImpl($provider);
            default:
                throw new Exception('No valid adapter found');
            // throw exception if no provider is selected from the list, need to do custom exception here instead after 1st review
        }
    }

}
