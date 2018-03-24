<?php

use Doctrine\DBAL\Driver\PDOPgSql\Driver;
//use Doctrine\DBAL\Driver\PDOMySql\Driver;

return [
    'doctrine' => [
        'connection' => [
            // default connection
            'default' => [
                'driverClass' => Driver::class,
                'params' => [
                    'driver'   => 'pdo_mysql',
                    'host'     => '127.0.0.1',
                    'port'     => '3306',
                    'dbname'   => 'Catalog_Recipes',
                    'user'     => 'root',
                    'password' => 'j5a264klxhr',
                    'charset'  => 'UTF8',
                ],
            ],
        ],
    ],
];
