<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 9:27
 */

namespace App\Application\User\UserSearch\ShowAllUsers;


use App\Infrastructure\Domain\Model\Repository\UsersRepository;

class ShowAllUsers
{
    private $repository;
    private $transform;

    public function __construct(UsersRepository $usersRepository, ShowAllUsersDataTransform $transform)
    {
        $this->repository = $usersRepository;
        $this->transform = $transform;
    }

    public function execute(ShowAllUsersCommand $allUsersCommand)
    {
        $allUser = $this->repository->findAllByLimit($allUsersCommand->getLimit(),$allUsersCommand->getPage());

        return $this->transform->transform($allUser);
    }
}