<?php

declare(strict_types=1);

namespace App\Handler;

use App\Handler\BucketAdapter;
use AppTest\Adapter\MockGCPSDK;

class GCPAdapterImpl implements BucketAdapter 
{
    private $sdk;

    public function __construct($sdk)
    {
        $this->sdk = $sdk;
    }
    public function list(string $remoteSrc): array  
    {
        return $this->sdk->listObjects($remoteSrc);
    }

}
