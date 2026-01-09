<?php

declare(strict_types=1);

namespace App\Handler;

use App\Handler\BucketAdapter;
use AppTest\Adapter\MockGCPSDK;
use App\Handler\IAWSClient;
use Aws\AwsClient;

class AWSAdapterImpl implements BucketAdapter 
{
    public function __construct(
        private IAWSClient $client
    ) {}

    public function upload(string $remote, string $content): void
    {
        $this->client->putObject($remote, $content);
    }
    public function list(string $remoteSrc, bool $recursive=false): array  
    {
        return $this->client->listObjects($remoteSrc, $recursive);
    }
    public function download(string $remote): string
    {
        return $this->client->getObject( $remote);
    }
    public function delete(string $remote, bool $recursive = false): void
    {
        $this->client->deleteObject( $remote, $recursive);
    }
    public function update(string $remote, string $content): void
    {
        $this->client->updateObject( $remote, $content);
    }
    public function share(string $remote, int $duration): string
    {
       return $this->client->shareObject( $remote, $duration);
    }
    public function doesExist(string $remote): bool
    {
        return $this->client->doesObjectExist($remote);
    }

}