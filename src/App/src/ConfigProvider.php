<?php

declare(strict_types=1);

namespace App;

/**
 * The configuration provider for the App module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     *
     */
    public function __invoke() : array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
        ];
    }

    /**
     * Returns the container dependencies
     */
    public function getDependencies() : array
    {
        return [
            'invokables' => [
                Handler\PingHandler::class => Handler\PingHandler::class,
            ],
            'factories'  => [
                Handler\HomePageHandler::class => Handler\HomePageHandlerFactory::class,
                Handler\TaskPageHandler::class => Handler\TaskPageHandlerFactory::class,
                Handler\CatalogCreateHandler::class => Handler\CatalogCreateHandlerFactory::class,
                Handler\AuthPageHandler::class => Handler\AuthPageHendlerFactory::class,
                Handler\AuthLoginHandler::class => Handler\AuthLoginHendlerFactory::class,
                Handler\AuthLogoutHandler::class => Handler\AuthLogoutHendlerFactory::class,
                Handler\SignUpHandler::class => Handler\SignUpHandlerFactory::class,
                Entity\Receipt_List::class => Entity\Receipt_List::class,
            ],
            'dependencies' => [
                'factories' => [
                    'doctrine.entity_manager.orm_default' => \ContainerInteropDoctrine\EntityManagerFactory::class,
                    Entity\Receipt_List::class => Entity\Receipt_List::class,
                ],
            ],
        ];
    }

    /**
     * Returns the templates configuration
     */
    public function getTemplates() : array
    {
        return [
            'paths' => [
                'app'    => [__DIR__ . '/../templates/app'],
                'error'  => [__DIR__ . '/../templates/error'],
                'layout' => [__DIR__ . '/../templates/layout'],
                'task'   => [__DIR__ . '/../templates/task'],
            ],
        ];
    }
}
