<?php

declare(strict_types=1);

namespace AppTest\Adapter;

use App\services\BucketService;
use PHPUnit\Framework\TestCase;
use App\Adapter\GCPAdapterImpl;

class BucketServiceTest extends TestCase
{
    public function testListReturnListObjectSucces(): void
    {
        //given prepare mock sdk
        $mockSdk = new MockGCPSDK();

        $adapter = new GCPAdapterImpl($mockSdk);
        $service = new BucketService($adapter);
        //when execute list function
        $result = $service->list('/documents');
        //then getting list of objects in the selected folder
        $this->assertEquals(['file1.txt', 'file2.txt'], $result);
    }

    public function testListReturnListObjectFail(): void
    {
        //given
        $mockSdk = new MockGCPSDK();

        $adapter = new GCPAdapterImpl($mockSdk);
        $service = new BucketService($adapter);
        //when
        $result = $service->list('/UnknownFolder');
        //then
        $this->assertEquals(['documents','images'], $result); 
        //might need to be changed into a expected exception when real sdk is implemented
        //need to check what if no folder is found in real sdk
    }
}
