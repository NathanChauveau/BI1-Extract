<?php

declare(strict_types=1);

namespace App\Adapter;

use App\Adapter\BucketAdapter;
use AppTest\Adapter\MockGCPSDK;

class GCPAdapterImpl implements BucketAdapter 
{
    private $sdk;

    public function __construct($sdk)
    {
        $this->sdk = $sdk;
    }

    public function upload(string $localSrc, string $remoteSrc): void
    {
        # Implement GCP upload logic here
    }

    public function download(string $localSrc, string $remoteSrc): void
    {
        # Implement GCP download logic here
    }
    public function delete(string $remoteSrc, bool $recursive): void
    {
        # Implement GCP delete logic here
    }
    public function list(string $remoteSrc): array  
    {
        return $this->sdk->listObjects($remoteSrc);
    }

}
