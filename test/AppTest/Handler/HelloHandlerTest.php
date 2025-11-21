<?php

namespace AppTest\Handler;

use App\Handler\HelloHandler;
use Laminas\Diactoros\ServerRequest;
use Mockery;
use PHPUnit\Framework\TestCase;
use Psr\Http\Server\RequestHandlerInterface;

class HelloHandlerTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
    }
    public function testProcessReturnsJsonResponse()
    {
        $handler = Mockery::mock(RequestHandlerInterface::class);
        $request = new ServerRequest([], [], '/api/hello', 'GET');

        $middleware = new HelloHandler('UnitTestService');
        $response = $middleware->process($request, $handler);

        $this->assertEquals(200, $response->getStatusCode());

        $body = json_decode((string)$response->getBody(), true);
        $this->assertEquals('UnitTestService', $body['service']);
        $this->assertEquals('Hello from Mezzio!', $body['message']);
    }
}
