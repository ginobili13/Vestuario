<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 12:27
 */

namespace App\Infrastructure\Controller\User\UserSearch;


use App\Application\User\UserSearch\ShowUserBySubDepartments\ShowUserBySubDepartments;
use App\Application\User\UserSearch\ShowUserBySubDepartments\ShowUserBySubDepartmentsCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ShowUserBySubDepartmentController extends Controller
{
    public function showUserBySubDepartment(ShowUserBySubDepartments $userBySubDepartments, Request $request)
    {
        $subDepartment = $request->get('id_subDepartment');

        $subDepartmentCommand = new ShowUserBySubDepartmentsCommand($subDepartment);
        $users = $userBySubDepartments->execute($subDepartmentCommand);

        return new Response ($users);
    }
}