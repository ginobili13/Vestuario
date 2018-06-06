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
        $userId = (int)$request->request->all()['userId'];
        $userSizes = $request->request->all()['userSize'];

       foreach ($userSizes as $userSize) {

            $userSizeCommand = new SetUserSizeCommand($userId, $userSize['user_size'], (int)$userSize['clothes_id']);
            $setUserSize->handle($userSizeCommand);

        }

        return new Response ($userId);

    }

    public function view(Request $request)
    {
        return $this->render('User/userSizesForm.html.twig', ['userId' => (int)$request->get('user_id')]);
    }
}
