<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 12:26
 */

namespace App\Infrastructure\Controller\User\UserSearch;


use App\Application\User\UserSearch\ShowUserByDepartment\ShowUserByDepartment;
use App\Application\User\UserSearch\ShowUserByDepartment\ShowUserByDepartmentCommand;
use App\Domain\Model\Entity\Department\DepartmentsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ShowUserByDepartmentController extends Controller
{
    public function showUserByDepartment(ShowUserByDepartment $userByDepartment, DepartmentsRepository $repository, Request $request)
    {
        $department = $request->get('department');

        $idDepartment = (int)$repository->getDepartmentId($department)->getId();

        $departmentCommand = new ShowUserByDepartmentCommand($idDepartment);
        $users = $userByDepartment->execute($departmentCommand);

        return new Response ($users);
    }
}
