<?php
namespace App\Handler;

use Aws\S3\S3Client;

class AWSClient implements IAWSClient
{

    public function __construct(private S3Client $s3) {}
    public function putObject(string $bucket, string $key, string $body): void
    {
        $this->s3->putObject([
            'Bucket' => $bucket,
            'Key'    => $key,
            'Body'   => $body,
        ]);
    }
    public function getObject(string $bucket, string $key): string
    {
        $result = $this->s3->getObject([
            'Bucket' => $bucket,
            'Key'    => $key,
        ]);
        return (string) $result['Body'];
    }
    public function deleteObject(string $bucket, string $key): void
    {
        $this->s3->deleteObject([
            'Bucket' => $bucket,
            'Key'    => $key,
        ]);
    }
    public function listObjects(string $bucket, string $prefix): array
    {
        $result = $this->s3->listObjectsV2([
            'Bucket' => $bucket,
            'Prefix' => $prefix,
        ]);
        $objects = [];
        if (isset($result['Contents'])) {
            foreach ($result['Contents'] as $object) {
                $objects[] = $object['Key'];
            }
        }
        return $objects;
    }
    public function shareObject(string $bucket, string $key, int $duration): string
    {
        $cmd = $this->s3->getCommand('GetObject', [
            'Bucket' => $bucket,
            'Key'    => $key,
        ]);
        $request = $this->s3->createPresignedRequest($cmd, "+{$duration} seconds");
        return (string) $request->getUri();
    }
    public function doesObjectExist(string $bucket, string $key): bool
    {
        return $this->s3->doesObjectExist($bucket, $key);
    }
    public function updateObject(string $bucket, string $key, string $body): void
    {
        $this->putObject($bucket, $key, $body);
    }
}
