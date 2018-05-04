<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 26/04/18
 * Time: 12:22
 */

namespace App\Application\User\UserSearch\ShowUserBySubDepartments;


use App\Infrastructure\Domain\Model\Repository\UsersRepository;

class ShowUserBySubDepartments
{
    private $repository;
    private $transform;

    public function __construct(UsersRepository $usersRepository, ShowUserBySubDepartmentsDataTransform $subDepartmentsTransform)
    {
        $this->repository = $usersRepository;
        $this->transform = $subDepartmentsTransform;
    }

    public function execute(ShowUserBySubDepartmentsCommand $subDepartmentsCommand)
    {
        $users = $this->repository->findUsersBySubDepartments($subDepartmentsCommand->getIdSubDepartment());

        return $this->transform->transform($users);
    }
}