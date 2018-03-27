<?php

declare(strict_types=1);

namespace App\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use function session_start;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Router;
use Zend\Expressive\Template;
use App\Entity\Receipt_List;



class TaskPageHandler implements RequestHandlerInterface
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
                'Message' => 'Error 404 Page Not Found',
            ]);
        }
        session_start();


        $data = [
            'Title' => 'Task Page',
            'session' => '',
        ];

//        $receipt_list = new Receipt_List();
//
//        $data['receipt_name'] = $receipt_list->Get_Name();
//        $data['receipt_description'] = $receipt_list->Get_Description();
//        $data['receipt_file'] = $receipt_list->Get_File();

        $data['receipt_name'] = 'receipt name';
        $data['receipt_description'] = "receipt description";
        $data['receipt_file'] = "Arch-Python-logo.png";

        if (isset($_SESSION['login_user'])){
            $data['session'] = $_SESSION['login_user'];
        }

        return new HtmlResponse($this->template->render('task::index', $data));
    }
}
