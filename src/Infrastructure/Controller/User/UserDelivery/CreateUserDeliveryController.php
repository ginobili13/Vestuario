<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 14:47
 */

namespace App\Infrastructure\Controller\User\UserDelivery;


use App\Application\User\UserDelivery\CreateUserDelivery\CreateUserDelivery;
use App\Application\User\UserDelivery\CreateUserDelivery\CreateUserDeliveryCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateUserDeliveryController extends Controller
{
    public function execute(Request $request, CreateUserDelivery $userDelivery)
    {
        $date_delivery = (int)$request->get('fecha');
        $clothesId = (int)$request->get('ropa');
        $quantity = (int)$request->get('cantidad');
        $userId = (int)$request->get('user_id');

        $createCommand = new CreateUserDeliveryCommand($date_delivery,$clothesId,$quantity,$userId);

        $userDelivery->handle($createCommand);

        return new Response ('Creado correctamente');
    }

    public function view(Request $request)
    {
        return $this->render('User/userDeliveryForm.html.twig', ['userId' => (int)$request->get('user_id')]);
    }
}