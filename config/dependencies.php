<?php declare(strict_types=1);

return [
    'dependencies' => [
        'factories' => [
            'db' => App\Infrastructure\Database\ConnectionFactory::class,
        ],
    ]
];