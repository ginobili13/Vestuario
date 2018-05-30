<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 26/04/18
 * Time: 12:08
 */

namespace App\Application\User\UserSearch\ShowUserByDepartment;


use App\Domain\Model\Entity\User\UsersRepository;

class ShowUserByDepartment
{
    private $repository;
    private $transform;

    public function __construct(UsersRepository $usersRepository, ShowUserByDepartmentDataTransform $departmentTransform)
    {
        $this->repository = $usersRepository;
        $this->transform = $departmentTransform;
    }

    public function execute(ShowUserByDepartmentCommand $departmentCommand): string
    {
        $users = $this->repository->findUserByDepartmentOrNull($departmentCommand->getIdDepartment());

        return $this->transform->transform($users);
    }
}
