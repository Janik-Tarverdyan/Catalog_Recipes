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
//                    'driver'   => 'pdo_mysql',
                    'driver'   => 'pdo_pgsql',
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

//
//    'doctrine' => [
//        'connection' => [
//            'orm_default' => [
//                'params' => [
//                    'url' => 'mysql://root:j5a264klxhr@localhost/Catalog_Recipes',
//                ],
//            ],
//        ],
//        'driver' => [
//            'orm_default' => [
//                'class' => \Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain::class,
//                'drivers' => [
//                    'App\Model' => 'Catalog_Recipes',
//                ],
//            ],
//            'Catalog_Recipes' => [
//                'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
//                'cache' => 'array',
//                'paths' => __DIR__ . '/../../src/App/Model',
//            ],
//        ],
//    ],

];
