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
    public function download(string $remote): string
    {
        return $this->client->getObject($this->bucket, $remote);
    }
    public function delete(string $remote, bool $recursive = false): void
    {
        $this->client->deleteObject($this->bucket, $remote, $recursive);
    }
    public function update(string $remote, string $content): void
    {
        $this->client->updateObject($this->bucket, $remote, $content);
    }
    public function share(string $remote, int $duration): string
    {
       return $this->client->shareObject($this->bucket, $remote, $duration);
    }
    public function doesExist(string $remote): bool
    {
        return $this->client->doesObjectExist($this->bucket, $remote);
    }

}