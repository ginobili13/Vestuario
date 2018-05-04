<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 12:06
 */

namespace App\Infrastructure\Controller\User\UserSearch;


use App\Application\User\UserSearch\ShowAllUsers\ShowAllUsers;
use App\Application\User\UserSearch\ShowAllUsers\ShowAllUsersCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ShowAllUsersController extends Controller
{
    public function showAllUsers(ShowAllUsers $showAllUsers, Request $request)
    {
        $page = $request->get('page');
        $limit = $request->get('limit');
        $showAllUsersCommand = new ShowAllUsersCommand($page,$limit);

        $allUsers = $showAllUsers->execute($showAllUsersCommand);

        return new Response ($allUsers);
    }
}

