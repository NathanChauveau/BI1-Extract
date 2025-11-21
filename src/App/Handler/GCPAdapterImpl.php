<?php

declare(strict_types=1);

namespace App\Handler;

use App\Handler\BucketAdapter;
use Test\Handler\MockGCPSDK;

class GCPAdapterImpl implements BucketAdapter 
{
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
    public function list(string $remoteSrc): array #todo 
    {
        $GCPSDK = new MockGCPSDK();
        return $GCPSDK->listObjects($remoteSrc);
    }

}
