<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 9:27
 */

namespace App\Application\User\UserSearch\ShowAllUsers;


use App\Domain\Model\Entity\User\UsersRepository;

class ShowAllUsers
{
    private $repository;
    private $transform;

    public function __construct(UsersRepository $usersRepository, ShowAllUsersDataTransform $transform)
    {
        $this->repository = $usersRepository;
        $this->transform = $transform;
    }

    public function execute(ShowAllUsersCommand $allUsersCommand): string
    {
        $allUser = $this->repository->findAllByLimitOrNull($allUsersCommand->getLimit(),$allUsersCommand->getPage());

        return $this->transform->transform($allUser);
    }
}
