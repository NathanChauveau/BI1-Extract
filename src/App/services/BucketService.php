<?php

declare(strict_types=1);

namespace App\Handler;


use App\Handler\BucketAdapter;

class BucketService  
{
    private BucketAdapter $adapter;

    public function __construct(CloudProvider $provider)
    {
        $this->provider = $provider;
    }

    public function download()
    {
        # Implement download logic here
    }

    public function delete()
    {
        # Implement delete logic here
    }

    public function list()#todo
    {
        
    }

    public function upload()
    {
        # Implement upload logic here
    }


}
