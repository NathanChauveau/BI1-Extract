<?php

declare(strict_types=1);

namespace App\Services;
use App\Handler\BucketAdapter;

class BucketService  
{
    private BucketAdapter $adapter;

    public function __construct(BucketAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function list(string $remotesrc)
    {
        return $this->adapter->list($remotesrc);
    }
    public function upload(string $remote, string $content): void
    {
        $this->adapter->upload($remote, $content);
    }
}
