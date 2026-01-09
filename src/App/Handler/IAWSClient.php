<?php
namespace App\Handler;

interface IAWSClient
{
    public function putObject(string $bucket, string $key, string $body): void;
    public function getObject(string $bucket, string $key): string;
    public function deleteObject(string $bucket, string $key): void;
    public function listObjects(string $bucket, string $prefix): array;
}
