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
        $date_delivery = (int)$request->get('date_delivery');
        $clothes_id = (int)$request->get('clothe_id');
        $quantity = (int)$request->get('quantity');
        $user_id = (int)$request->get('user_id');

        $createCommand = new CreateUserDeliveryCommand($date_delivery,$clothes_id,$quantity,$user_id);
        $userDelivery->handle($createCommand);

        return new Response ('Creado correctamente');
    }
}