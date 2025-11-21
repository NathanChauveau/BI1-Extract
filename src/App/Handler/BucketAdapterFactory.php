<?php

declare(strict_types=1);

namespace App\Handler;


use App\Handler\BucketAdapter;

class BucketAdapterFactory 
{
    public getAdapter(CloudProvider $provider): BucketAdapter
    {
        return new BucketService($provider);
    }

}
