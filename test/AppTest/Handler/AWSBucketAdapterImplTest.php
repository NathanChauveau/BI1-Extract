<?php

declare(strict_types=1);

namespace AppTest\Handler;

use App\Handler\AWSAdapterImpl;
use PHPUnit\Framework\TestCase;
use App\Handler\IAWSClient;

final class AWSBucketAdapterImplTest extends TestCase
{
    private $mockClient;
    private $adapter;
    private string $bucket = 'test-bucket';

    protected function setUp(): void
    {
        parent::setUp();

        //given -> prepare the AWS mock
        $this->mockClient = $this->createMock(IAWSClient::class);
        $this->adapter = new AWSAdapterImpl($this->mockClient);
    }
    public function testUploadObjectSuccess(): void
    {
        //given prepare mock sdk
        $fileName = 'file.txt';
        $content = 'Hello World';
        //when execute the function
        $this->mockClient->expects($this->once())
            ->method('putObject')
            ->with($fileName, $content);
        //then the function is executed without errors
        $this->adapter->upload($fileName, $content);
    }

    public function testUploadObjectFail(): void
    {
        //given
        $fileName = 'file.txt';
        $content = 'Hello World';
        //when
        $this->mockClient->method('putObject')
            ->willThrowException(new \RuntimeException('Upload failed'));

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Upload failed');
        //then
        $this->adapter->upload($fileName, $content);
    }

    public function testListReturnListObjectSuccess(): void
    {
        //given
        $expectedList = ['file1.txt', 'file2.txt'];
        $remoteSrc = 'folder/';

        //when
        $this->mockClient->expects($this->once())
            ->method('listObjects')
            ->with($remoteSrc)
            ->willReturn($expectedList);

        $result = $this->adapter->list($remoteSrc);
        //then
        $this->assertEquals($expectedList, $result);
    }

    public function testListReturnListObjectFail(): void
    {
        //given 
        $remoteSrc = 'folder/';
        //when
        $this->mockClient->method('listObjects')
            ->willThrowException(new \RuntimeException('List failed'));

        $this->expectException(\RuntimeException::class);
        //then
        $this->adapter->list($remoteSrc);

        //might need to be changed into a expected exception when real sdk is implemented
        //need to check what if no folder is found in real sdk
    }

    public function testUpdateObjectSuccess(): void
    {
        //given
        $fileName = 'file.txt';
        $content = 'Updated content';
        //when
        $this->mockClient->expects($this->once())
            ->method('updateObject')
            ->with( $fileName, $content);
        //then
        $this->adapter->update($fileName, $content);
    }
    public function testUpdateObjectFail(): void
    {
        //given
        $fileName = 'file.txt';
        $content = 'Updated content';
        //when
        $this->mockClient->method('updateObject')
            ->willThrowException(new \RuntimeException('Update failed'));

        $this->expectException(\RuntimeException::class);
        //then
        $this->adapter->update($fileName, $content);
    }
    public function testDownloadObjectSuccess(): void
    {
        //given
        $fileName = 'file.txt';
        $expectedContent = 'File content';
        //when
        $this->mockClient->method('getObject')
            ->with( $fileName)
            ->willReturn($expectedContent);
        //then
        $this->assertEquals($expectedContent, $this->adapter->download($fileName));
    }
    public function testDownloadObjectFail(): void
    {
        //given
        $fileName = 'file.txt';

        //when
        $this->mockClient->method('getObject')
            ->willThrowException(new \RuntimeException('Download failed'));

        $this->expectException(\RuntimeException::class);
        //then
        $this->adapter->download($fileName);
    }
    public function testShareObjectSuccess(): void
    {
        //given
        $fileName = 'file.txt';
        $duration = 3600;
        $expectedUrl = 'https://temp-url';

        //when
        $this->mockClient->expects($this->once())
            ->method('shareObject')
            ->with( $fileName)
            ->willReturn($expectedUrl);
        //then
        $result = $this->adapter->share($fileName, $duration);

        $this->assertEquals($expectedUrl, $result);
    }
    public function testShareObjectFail(): void
    {
        //given
        $fileName = 'file.txt';
        $duration = 3600;

        //when
        $this->mockClient->method('shareObject')
            ->willThrowException(new \RuntimeException('Share failed'));

        $this->expectException(\RuntimeException::class);
        //then
        $this->adapter->share($fileName, $duration);
    }

    public function testDoesObjectExistSuccess(): void
    {
        //given
        $fileName = 'file.txt';
        //when
        $this->mockClient->method('doesObjectExist')
            ->with( $fileName)
            ->willReturn(true);
        $reflection = new \ReflectionClass($this->adapter);
        $method = $reflection->getMethod('doesExist');
        $method->setAccessible(true);
        //then
        $this->assertTrue($method->invoke($this->adapter, $fileName));
    }
    public function testDeleteObjectSuccess(): void
    {
        //given
        $fileName = 'file.txt';
        //when
        $this->mockClient->expects($this->once())
            ->method('deleteObject')
            ->with( $fileName);
        //then
        $this->adapter->delete($fileName);
    }
    public function testDeleteObjectFail(): void
    {
        //given
        $fileName = 'file.txt';
        //when
        $this->mockClient->method('deleteObject')
            ->willThrowException(new \RuntimeException('Delete failed'));

        $this->expectException(\RuntimeException::class);
        //then
        $this->adapter->delete($fileName);
    }
}
