<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Zend\Expressive\Application;
use Zend\Expressive\MiddlewareFactory;

/**
 * Setup routes with a single request method:
 *
 * $app->get('/', App\Handler\HomePageHandler::class, 'home');
 * $app->post('/album', App\Handler\AlbumCreateHandler::class, 'album.create');
 * $app->put('/album/:id', App\Handler\AlbumUpdateHandler::class, 'album.put');
 * $app->patch('/album/:id', App\Handler\AlbumUpdateHandler::class, 'album.patch');
 * $app->delete('/album/:id', App\Handler\AlbumDeleteHandler::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $app->route('/contact', App\Handler\ContactHandler::class, ['GET', 'POST', ...], 'contact');
 *
 * Or handling all request methods:
 *
 * $app->route('/contact', App\Handler\ContactHandler::class)->setName('contact');
 *
 * or:
 *
 * $app->route(
 *     '/contact',
 *     App\Handler\ContactHandler::class,
 *     Zend\Expressive\Router\Route::HTTP_METHOD_ANY,
 *     'contact'
 * );
 */
return function (Application $app, MiddlewareFactory $factory, ContainerInterface $container) : void {
    $app->get(
        '/',
        App\Handler\HomePageHandler::class,
        'home'
    );

    $app->get(
        '/api/ping',
        App\Handler\PingHandler::class,
        'api.ping'
    );

    $app->get(
        '/api/task',
        App\Handler\TaskPageHandler::class,
        'api.task'
    );

    $app->get(
        '/api/auth',
        App\Handler\AuthPageHandler::class,
        'api.auth'
    );

    $app->get(
        '/api/auth/logout',
        App\Handler\AuthLogoutHandler::class,
        'api.auth.logout'
    );

    $app->route(
        '/api/catalog/create',
        App\Handler\CatalogCreateHandler::class,
        Zend\Expressive\Router\Route::HTTP_METHOD_ANY,
        'api.catalog.create'
    );

    $app->route(
        '/api/receipt/delete',
        App\Handler\CatalogCreateHandler::class,
        Zend\Expressive\Router\Route::HTTP_METHOD_ANY,
        'api.receipt.delete'
    );

    $app->route(
        '/api/auth/signin',
        App\Handler\AuthLoginHandler::class,
        Zend\Expressive\Router\Route::HTTP_METHOD_ANY,
        'api.auth.signin'
    );

    $app->route(
        '/api/auth/signup',
        App\Handler\SignUpHandler::class,
        Zend\Expressive\Router\Route::HTTP_METHOD_ANY,
        'api.auth.signup'
    );
};
