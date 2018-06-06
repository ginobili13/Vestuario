<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 12:29
 */

namespace App\Infrastructure\Controller\User\UserSearch;


use App\Application\User\UserSearch\ShowUserByEmployeeCode\ShowUserByEmployeeCode;
use App\Application\User\UserSearch\ShowUserByEmployeeCode\ShowUserByEmployeeCodeCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ShowUserByEmployeeCodeController extends Controller
{
    public function showUserByEmployeeCode(ShowUserByEmployeeCode $showUserByEmployeeCode, Request $request)
    {
        $employee_code = (int)$request->get('employee_code');

        $showUserByEmployeeCodeCommand = new ShowUserByEmployeeCodeCommand($employee_code);
        $user = $showUserByEmployeeCode->execute($showUserByEmployeeCodeCommand);

        return new Response ($user);
    }
}
