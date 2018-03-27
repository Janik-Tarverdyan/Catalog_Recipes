<?php

declare(strict_types=1);

namespace App\Handler;

use function md5;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Template;
use Zend\Expressive\Router;
use App\Entity\Users;



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

//           if ($data['Password'] === $data['Re_Password']){
//               $data['Password'] = md5($data['Password']);
//
//               $Insert_User = new Users($data['User_Name'], $data['eMail'], $data['Password']);
////               $Insert_User->jsonSerialize();
//
//               $data['insert_user'] = $Insert_User;
//           }
//           else
//           {
//               return new JsonResponse([
//                   'Message' => "Password is not valid",
//               ]);
//           }

           return new JsonResponse($data);
       }
       else {
           return new JsonResponse([
               'Message' => 'Error 404 page not found',
           ]);
       }
    }
}
