<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 12:02
 */

namespace App\Infrastructure\Controller\User\UserSize;


use App\Application\User\UserSize\ShowUserSize\ShowUserSize;
use App\Application\User\UserSize\ShowUserSize\ShowUserSizeCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class UserSizeController extends Controller
{
    public function userSize(Request $request, ShowUserSize $showUserSize)
    {
        $id = $request->get('id_user');

        $userCommand = new ShowUserSizeCommand($id);

        $user = $showUserSize->execute($userCommand);

        return new Response($user);

    }

    public function view()
    {
        return $this->render('User/userSizesForm.html.twig');
    }
}
