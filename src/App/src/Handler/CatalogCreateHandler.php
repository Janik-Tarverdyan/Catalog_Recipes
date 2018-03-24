<?php

declare(strict_types=1);

# class namespace
namespace App\Handler;

# Usage Modules
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router;
use Zend\Expressive\Template;


class CatalogCreateHandler implements RequestHandlerInterface
{
    private $containerName;

    private $router;

    private $template;

    public function __construct(
        Router\RouterInterface $router,
        Template\TemplateRendererInterface $template = null,
        string $containerName
    ) {
        $this->router        = $router;
        $this->template      = $template;
        $this->containerName = $containerName;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        if (! $this->template) {
            return new JsonResponse([
                'Message' => 'Error 404 Page found',
            ]);
        }

        if ( isset($_POST['submit']) ):
            $Name = $_POST['Name'];
            $Description = $_POST['Description'];

            $data = [
                'Name' => $Name,
                'Description' => $Description,
            ];

            return new RedirectResponse('/api/task');
//            return new JsonResponse($data);
        else:
            return new JsonResponse([
                'Message' => 'Error 404 Page Not Found',
            ]);
        endif;

    }
}
