<?php

declare(strict_types=1);

# class namespace
namespace App\Handler;

# Usage Modules
use DateTime;
use function getcwd;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router;
use Zend\Expressive\Template;
use App\Entity\Receipt_List;


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

        if ( isset($_POST['submit']) ) {
            $data = [
                'Name'        => $_POST['Name'],
                'Description' => $_POST['Description'],
                'File'        => $_FILES['icon']['name'],
                'Path'        => getcwd(),
            ];

            $Upload_Dir = $data['Path'].'/public/uploads/image/';
            $data['Path'] = $Upload_Dir;

            $Upload_File = $data['Path'].basename($data['File']);

            if (move_uploaded_file($_FILES['icon']['tmp_name'], $Upload_File)) {
//                $insert_data = new Receipt_List($data['Name'], $data['Description'], $data['File']);

                return new RedirectResponse('/api/task');

            } else {
                return new JsonResponse([
                    "Message" => "Possible file upload attack!"
                ]);
            }

//            return new RedirectResponse('/api/task');
//            return new JsonResponse($data);
        }
        else {
            return new JsonResponse([
                'Message' => 'Error 404 Page Not Found',
            ]);
        }

    }
}
