<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 26/04/18
 * Time: 8:35
 */

namespace App\Application\User\UserSearch\ShowUserByEmployeeCode;


use App\Domain\Model\Entity\User\UsersRepository;

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
        $user = $this
            ->repository
            ->findUserByEmployeeCodeOrNull
            (
                $showUserByEmployeeCodeCommand
                    ->getEmployeeCode()
            );

        return $this->transform->transform($user);
    }
}
