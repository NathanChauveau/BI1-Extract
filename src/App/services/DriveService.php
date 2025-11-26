<?php

declare(strict_types=1);

namespace App\Handler;


use App\Handler\BucketAdapter;

class DriveService  
{
    private DriveAdapter $adapter;

    public function __construct(DriveAdapter $adapter)
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

    public function list(string $remotesrc)#todo
    {
        return $this->adapter->list($remotesrc);
    }

    public function upload()
    {
        # Implement upload logic here
    }


}
