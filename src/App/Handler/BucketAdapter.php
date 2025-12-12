<?php

declare(strict_types=1);

namespace App\Handler;


interface BucketAdapter
{
    // Define any methods that the DefaultSDKHandler should implement then send it to all SDK Handlers
    public function list(string $remotrSrc): array;  
   
}
