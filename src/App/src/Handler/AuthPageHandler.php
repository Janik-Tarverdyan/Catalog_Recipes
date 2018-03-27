<?php

declare(strict_types=1);

namespace App\Handler;

use function session_start;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Zend\Expressive\Template;
use Zend\Expressive\Router;

class AuthPageHandler implements RequestHandlerInterface
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
        $data = [
            'Title' => "Auth Page"
        ];

        if (! $this->template) {
            return new JsonResponse([
                'Message' => 'Error 404 Page found',
            ]);
        }


        session_start();

        if ( isset($_SESSION['login_user']) ){
            return new JsonResponse([
                "Session" => $_SESSION['login_user'],
            ]);
        }
        else{
            return new HtmlResponse($this->template->render('task::auth', $data));
        }
    }
}
