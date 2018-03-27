<?php declare(strict_types=1);

namespace App;

use Interop\Container\ContainerInterface;

class CatalogObjectFactory
{
    public function __invoke(ContainerInterface $container) : CatalogObject
    {
        $connection = $container->get('db');
        return new CatalogObject($connection);
    }
}