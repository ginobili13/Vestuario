<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 26/04/18
 * Time: 12:22
 */

namespace App\Application\User\UserSearch\ShowUserBySubDepartments;


use App\Domain\Model\Entity\User\UsersRepository;

class ShowUserBySubDepartments
{
    private $repository;
    private $transform;

    public function __construct(UsersRepository $usersRepository, ShowUserBySubDepartmentsDataTransform $subDepartmentsTransform)
    {
        $this->repository = $usersRepository;
        $this->transform = $subDepartmentsTransform;
    }

    /**
     * @param ShowUserBySubDepartmentsCommand $subDepartmentsCommand
     * @return string
     */
    public function execute(ShowUserBySubDepartmentsCommand $subDepartmentsCommand): string
    {
        $users = $this->repository->findUsersBySubDepartmentsOrNull($subDepartmentsCommand->getIdSubDepartment());

        return $this->transform->transform($users);
    }
}
