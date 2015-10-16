<?php
return [
    'defaults' => [
        'supportsCredentials' => false,
        'allowedOrigins' => [],
        'allowedHeaders' => [],
        'allowedMethods' => [],
        'exposedHeaders' => [],
        'maxAge' => 0,
        'hosts' => [],
    ],
    'paths' => [
        'api/v1/*' => [
            'allowedOrigins' => ['*'],
            'allowedHeaders' => ['Origin', 'Authorization', 'X-Requested-With', 'Content-Type', 'Accept', 'Cache-Control'],
            'allowedMethods' => ['GET', 'POST', 'PUT','DELETE'],
            'maxAge' => 3600,
        ],
    ],
];