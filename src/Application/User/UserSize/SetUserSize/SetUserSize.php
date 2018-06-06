<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 11:17
 */

namespace App\Application\User\UserSize\SetUserSize;


use App\Domain\Model\Entity\User\UserSize\UserSizes;
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

        if(0 === $this->repository->checkUserSize($command->userId(), $command->clotheId())) {

            $newUserSize = new UserSizes();

            $newUserSize->setUserSize($command->userSize());
            $newUserSize->setUserId($command->userId());
            $newUserSize->setClothe($this->repository->findClotheOrNull($command->clotheId()));

            $this->repository->createUserSize($newUserSize);

        } else {
            $userSize = $this->repository->findUserSizeOrNull($command->userId(), $command->clotheId());

            $userSize->setUserSize($command->userSize());
            $userSize->setUserId($command->userId());
            $userSize->setClothe($this->repository->findClotheOrNull($command->clotheId()));

            $this->repository->updateUserSize();

        }

    }
}

