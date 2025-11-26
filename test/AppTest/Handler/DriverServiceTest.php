<?php

declare(strict_types=1);

namespace AppTest\Handler;

use PHPUnit\Framework\TestCase;
use App\Handler\DriveService;
use App\Handler\GCPAdapterImpl;

class DriverServiceTest extends TestCase
{
    public function testListReturnListObjectSucces(): void
    {
        //given
        $adapter = new GCPAdapterImpl();
        $service = new DriveService($adapter);
        //when
        $result = $service->list('/documents');
        //then
        $this->assertEquals(['file1.txt', 'file2.txt'], $result);
    }

    public function testListReturnListObjectFail(): void
    {
        //given
        $adapter = new GCPAdapterImpl();
        $service = new DriveService($adapter);
        //when
        $result = $service->list('/UnknownFolder');
        //then
        $this->assertEquals([], $result);
    }
}
