<?php

declare(strict_types=1);

namespace App\Bucket;

#todo -> current step : $service injection in controller without calling listObjects | next step : be able to call service from controller

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use \Psr\Http\Message\ResponseInterface;
use App\Services\BucketService;

class CreateObject implements RequestHandlerInterface
# this comment is a reminder of the road of a request -> router to controller to service to interface ("X" Implem. decide by factory) to "X"AdapterImpl to SDK/mock
# do rest of method after 1st livrable
# might need to think how to do the rest of the methods later
{
    public function __construct(private BucketService $bucketService) {}

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        /*$parsedBody = $request->getParsedBody() ?? [];
        $remote = $parsedBody['remoteSrc'] ?? null;
        $content = $parsedBody['content'] ?? null;*/
        // to add , 'remote' => $remote, 'content' => $content
        //curl to use : curl -X POST "http://localhost:8080/api/v1/upload" -H "Content-Type: application/json" -d '{"remoteSrc":"/","content":"text.txt"}'

        return new JsonResponse(['status' => 'success']);
    }

    public function uploadObjects(string $remoteSrc, string $content): void
    {
        $this->bucketService->upload($remoteSrc, $content);
    }
}
