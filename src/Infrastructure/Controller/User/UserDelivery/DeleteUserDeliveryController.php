<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 14:47
 */

namespace App\Infrastructure\Controller\User\UserDelivery;


use App\Application\User\UserDelivery\DeleteUserDelivery\DeleteUserDelivery;
use App\Application\User\UserDelivery\DeleteUserDelivery\DeleteUserDeliveryCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteUserDeliveryController extends Controller
{
    public function execute(Request $request, DeleteUserDelivery $userDelivery)
    {
        $userDelivery_id = (int)$request->get('userDelivery_id');

        $createCommand = new DeleteUserDeliveryCommand($userDelivery_id);

        $userDelivery->handle($createCommand);

        return new Response ('Borrado correctamente');
    }
}