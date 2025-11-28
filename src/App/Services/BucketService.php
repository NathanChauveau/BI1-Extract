<?php

declare(strict_types=1);

namespace App\Services;
use App\Adapter\BucketAdapter;

class BucketService  
{
    private BucketAdapter $adapter;

    public function __construct(BucketAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function download()
    {
        # Implement download logic here
    }

    public function delete()
    {
        # Implement delete logic here
    }

    public function list(string $remotesrc)
    {
        return $this->adapter->list($remotesrc);
    }

    public function upload()
    {
        # Implement upload logic here
    }


}
