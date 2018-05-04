<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 11:54
 */

namespace App\Infrastructure\Controller\User\UserDelivery;


use App\Application\User\UserDelivery\ShowUserDelivery\ShowUserDelivery;
use App\Application\User\UserDelivery\ShowUserDelivery\ShowUserDeliveryCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class UserDeliveryController extends Controller
{
    public function userDelivery(ShowUserDelivery $userDelivery, Request $request)
    {
        $idUser = (integer)$request->get('id_user');

        $userDeliveryCommand = new ShowUserDeliveryCommand($idUser);

        $userDeliveries = $userDelivery->execute($userDeliveryCommand);

        return new Response($userDeliveries);

    }

}