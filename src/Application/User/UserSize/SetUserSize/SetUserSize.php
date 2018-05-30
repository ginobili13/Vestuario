<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 11:17
 */

namespace App\Application\User\UserSize\SetUserSize;


use App\Domain\Model\Entity\User\UserSize\UserSizesRepository;

class SetUserSize
{
    private $repository;


    public function __construct(UserSizesRepository $userSizesRepository)
    {
        $this->repository = $userSizesRepository;

    }

    /**
     * @param SetUserSizeCommand $command
     */
    public function handle(SetUserSizeCommand $command): void
    {
        $userSize = $this->repository->findUserSizeOrNull($command->userSizeId());

        $userSize->setUserSize($command->userSize());

        $this->repository->updateUserSize();

    }
}

