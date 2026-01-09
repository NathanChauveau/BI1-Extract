<?php
namespace App\Handler;

interface IAWSClient
{
    public function putObject(string $bucket, string $key, string $body): void;
    public function getObject(string $bucket, string $key): string;
    public function deleteObject(string $bucket, string $key): void;
    public function listObjects(string $bucket, string $prefix): array;
    public function shareObject(string $bucket, string $key, int $duration): string;
    public function doesObjectExist(string $bucket, string $key): bool;
    public function updateObject(string $bucket, string $key, string $body): void;
}
