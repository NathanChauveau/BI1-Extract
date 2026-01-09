<?php

declare(strict_types=1);

namespace AppTest\Adapter;

use App\services\BucketService;
use PHPUnit\Framework\TestCase;
use App\Handler\GCPAdapterImpl;
use AppTest\Handler\MockGCPSDK;

class BucketImplTestGCP extends TestCase
{
    private IGCPClient $mockGCPclient;

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
        $this->assertEquals(['documents', 'images'], $result);
        //might need to be changed into a expected exception when real sdk is implemented
        //need to check what if no folder is found in real sdk
    }

    public function testCreateObjectSuccess(): void
    {
        //given

        //when

        //then
    }
    public function testCreateObjectFail(): void
    {
        //given

        //when

        //then
    }

    public function testUpdateObjectSuccess(): void
    {
        //given

        //when

        //then
    }
    public function testUpdateObjectFail(): void
    {
        //given

        //when

        //then
    }
    public function testDownloadObjectSuccess(): void
    {
        //given

        //when

        //then
    }
    public function testDownloadObjectFail(): void
    {
        //given

        //when

        //then
    }
    public function testShareObjectSuccess(): void
    {
        //given

        //when

        //then
    }
    public function testShareObjectFail(): void
    {
        //given

        //when

        //then
    }

    public function testDoesObjectExistSuccess(): void
    {
        //given

        //when

        //then
    }
}
