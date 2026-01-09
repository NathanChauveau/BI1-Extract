<?php

declare(strict_types=1);

namespace AppTest\Handler;

use App\Handler\AWSAdapterImpl;
use App\services\BucketService;
use PHPUnit\Framework\TestCase;
use App\Handler\GCPAdapterImpl;
use AppTest\Handler\MockGCPSDK;
use App\Handler\IAWSClient;

final class AWSBucketAdapterImplTest extends TestCase
{
    public function testListReturnListObjectSucces(): void
    {
        //given prepare mock sdk
        $mockClient = $this->createMock(IAWSClient::class);
        //when execute list function
        $mockClient->expects($this->once())
            ->method('putObject')
            ->with(
                'test-bucket',
                'file.txt',
                'content'
            );
        $adapter = new AWSAdapterImpl(
            $mockClient,
            'test-bucket'
        );
        $adapter->upload('file.txt', 'content');
        //then getting list of objects in the selected folder
    }

  /*  public function testDownloadReturnsContent(): void
    {
        $mockClient = $this->createMock(IAWSClient::class);

        $mockClient->method('getObject')
            ->with('test-bucket', 'file.txt')
            ->willReturn('hello');

        $adapter = new AWSAdapterImpl(
            $mockClient,
            'test-bucket'
        );

        $this->assertSame('hello', $adapter->download('file.txt'));
    }
*/
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
