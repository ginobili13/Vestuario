<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 11:41
 */

namespace App\Infrastructure\Controller\User\UserSize;


use App\Application\User\UserSize\SetUserSize\SetUserSize;
use App\Application\User\UserSize\SetUserSize\SetUserSizeCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SetUserSizeController extends Controller
{
    public function setUserSize(Request $request, SetUserSize $setUserSize)
    {
        $userSizeId = (int)$request->get('userSize_id');
        $userSize = $request->get('size');

        $userSizeCommand = new SetUserSizeCommand($userSizeId,$userSize);

        $setUserSize->handle($userSizeCommand);

        return new Response ('Modificado correctamente');

    }

}