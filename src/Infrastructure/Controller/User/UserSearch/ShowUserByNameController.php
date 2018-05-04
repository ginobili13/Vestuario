<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 12:32
 */

namespace App\Infrastructure\Controller\User\UserSearch;


use App\Application\User\UserSearch\ShowUserByName\ShowUserByName;
use App\Application\User\UserSearch\ShowUserByName\ShowUserByNameCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ShowUserByNameController extends Controller
{
    public function showUserByName(ShowUserByName $showUserByName, Request $request)
    {
        $name = $request->get('name');

        $userCommand = new ShowUserByNameCommand($name);
        $user = $showUserByName->execute($userCommand);

        return new Response ($user);
    }
}
