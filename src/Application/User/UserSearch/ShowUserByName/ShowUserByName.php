<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 25/04/18
 * Time: 13:42
 */

namespace App\Application\User\UserSearch\ShowUserByName;

use App\Domain\Model\Entity\User\UsersRepository;

class ShowUserByName
{
    private $repository;
    private $transform;

    public function __construct(UsersRepository $usersRepository, ShowUserByNameDataTransform $showUserByNameDataTransform)
    {
        $this->repository = $usersRepository;
        $this->transform = $showUserByNameDataTransform;
    }


    public function execute(ShowUserByNameCommand $showUserByNameCommand): string
    {
        $user = $this->repository->findUserByNameOrNull($showUserByNameCommand->getName());

        return $this->transform->transform($user);
    }
}
