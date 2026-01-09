<?php
namespace App\Handler;

use Aws\S3\S3Client;

class AWSClient implements IAWSClient
{
    public function __construct(private S3Client $s3, private string $bucket) {}
    public function putObject(string $key, string $body): void
    {
        $this->s3->putObject([
            'Bucket' => $this->bucket,
            'Key'    => $key,
            'Body'   => $body,
        ]);
    }
    public function getObject(string $key): string
    {
        $result = $this->s3->getObject([
            'Bucket' => $this->bucket,
            'Key'    => $key,
        ]);
        return (string) $result['Body'];
    }
    public function deleteObject(string $key, bool $recursive): void
    {
        $this->s3->deleteObject([
            'Bucket' => $this->bucket,
            'Recursive'=> $recursive,
            'Key'    => $key,
        ]);
    }
    public function listObjects(string $key, bool $recursive): array
    {
        $result = $this->s3->listObjectsV2([
            'Bucket' => $this->bucket,
            'Recursive'=> $recursive,
            'Key'    => $key,
        ]);
        $objects = [];
        if (isset($result['Contents'])) {
            foreach ($result['Contents'] as $object) {
                $objects[] = $object['Key'];
            }
        }
        return $objects;
    }
    public function shareObject(string $key, int $duration): string
    {
        $cmd = $this->s3->getCommand('GetObject', [
            'Bucket' => $this->bucket,
            'Key'    => $key,
        ]);
        $request = $this->s3->createPresignedRequest($cmd, "+{$duration} seconds");
        return (string) $request->getUri();
    }
    public function doesObjectExist(string $key): bool
    {
        return $this->s3->doesObjectExist($this->bucket,$key);
    }
    public function updateObject(string $key, string $body): void
    {
        $this->putObject($key, $body);
    }
}
