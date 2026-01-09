<?php

return [
    'app' => [
        'name' => 'MyMicroService',
    ],
    'aws' => [
    'credentials' => [
        'key'    => getenv('AWS_ACCESS_KEY_ID'),
        'secret' => getenv('AWS_SECRET_ACCESS_KEY'),
    ],
    'region' => 'eu-central-1',
    'version' => 'latest',
    'bucket' => 'bi1-nathan',
    ],
];
