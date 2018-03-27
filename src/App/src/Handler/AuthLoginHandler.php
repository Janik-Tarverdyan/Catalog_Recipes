<?php

declare(strict_types=1);

namespace App\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use function session_start;
use SessionHandler;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router;
use Zend\Expressive\Template;



class AuthLoginHandler implements RequestHandlerInterface
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
                'Message' => 'Error 404 Page Not Found',
            ]);
        }
        session_start();


        if ( isset($_SESSION['login_user']) ){
//            return new JsonResponse([
//                "Session" => $_SESSION['login_user'],
//            ]);
            return new RedirectResponse('/api/task');
        }
        else{
            if ( isset($_POST['btn_signin']) ){
                $eMail    = $_POST['email'];
                $Password = $_POST['password'];



                if ($eMail=="Mr.Janik@gmail.com" && $Password=="j5a264klxhr"){
                    $data['Name'] = $eMail;
                    $data['Password'] = md5($Password);

                    $_SESSION['login_user'] = $eMail;

                    $data['session_id'] = $_SESSION['login_user'];

//                    return new JsonResponse($data);
                    return new RedirectResponse('/api/task');
                }
                else{
                    return new RedirectResponse("/api/auth");
                }
            }
            else{
                return new JsonResponse([
                    'Message' => 'Error 404 Page Not Found'
                ]);
            }
        }
    }
}
