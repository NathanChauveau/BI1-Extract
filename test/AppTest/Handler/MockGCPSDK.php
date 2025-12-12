<?php

declare(strict_types=1);

namespace AppTest\Handler;

class MockGCPSDK 
// Mock just here to do the base before adding the real GCP SDK 
{
    public function uploadObject(string $localSrc, string $remoteSrc): void
    {
        # Mock upload logic
    }

    public function downloadObject(string $localSrc, string $remoteSrc): void
    {
        # Mock download logic
    }

    public function deleteObject(string $remoteSrc, bool $recursive): void
    {
        # Mock delete logic
    }

    public function listObjects(string $remoteSrc): array
    {
        # Mock list logic
        switch ($remoteSrc) {
            case '/documents':
                return ['file1.txt', 'file2.txt'];
            case '/images ':
                return ['image1.png', 'image2.jpg'];
            default:
                return ['documents', 'images'];
        }
    }
}
