<?php

declare(strict_types=1);

namespace App\Handler;

use App\Handler\DriveAdapter;
use AppTest\Handler\MockGCPSDK;

class GCPAdapterImpl implements DriveAdapter 
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
    public function list(string $remoteSrc): array #todo 
    {
        return $this->sdk->listObjects($remoteSrc);
    }

}
