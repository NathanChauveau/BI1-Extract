<?php
namespace App\Handler;

interface IAWSClient
{
    public function putObject(string $key, string $body): void;
    public function getObject(string $key): string;
    public function deleteObject(string $key, bool $recursive): void;
    public function listObjects(string $key, bool $recursive): array;
    public function shareObject(string $key, int $duration): string;
    public function doesObjectExist(string $key): bool;
    public function updateObject(string $key, string $body): void;
}
