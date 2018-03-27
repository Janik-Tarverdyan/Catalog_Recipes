<?php

declare(strict_types=1);

namespace App\Handler;

use function date_add;
use function pg_escape_literal;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Template;
use Zend\Expressive\Router;



class SignUpHandler implements RequestHandlerInterface
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
       if (isset($_POST['btn_signup'])) {
           $data = [
               "User_Name"   => $_POST['username'],
               "eMail"       => $_POST['email'],
               "Password"    => $_POST['password'],
               "Re_Password" => $_POST['repeat_password'],
           ];

           return new JsonResponse($data);
       }
       else {
           return new JsonResponse([
               'Message' => 'Error 404 page not found',
           ]);
       }
    }
}
