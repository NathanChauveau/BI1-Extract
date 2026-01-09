<?php

declare(strict_types=1);

namespace App\Handler;

use App\Handler\BucketAdapter;
use AppTest\Adapter\MockGCPSDK;
use App\Handler\IAWSClient;

class AWSAdapterImpl implements BucketAdapter 
{
    public function __construct(
        private IAWSClient $client,
        private string $bucket
    ) {}

    public function upload(string $remote, string $content): void
    {
        $this->client->putObject($this->bucket, $remote, $content);
    }
    public function list(string $remoteSrc): array  
    {
        return $this->client->listObjects($this->bucket, $remoteSrc);
    }

}
