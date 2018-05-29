<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 26/04/18
 * Time: 8:35
 */

namespace App\Application\User\UserSearch\ShowUserByEmployeeCode;


use App\Infrastructure\Domain\Model\Repository\UsersRepository;


class ShowUserByEmployeeCode
{
    private $repository;
    private $transform;

    public function __construct(UsersRepository $usersRepository, ShowUserByEmployeeCodeDataTransform $employeeCodeTransform)
    {
        $this->repository = $usersRepository;
        $this->transform = $employeeCodeTransform;
    }

    public function execute(ShowUserByEmployeeCodeCommand $showUserByEmployeeCodeCommand)
    {

        $user = $this->repository->findUserByEmployeeCode($showUserByEmployeeCodeCommand->getEmployeeCode());

        return $this->transform->transform($user);
    }
}