<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 11:17
 */

namespace App\Application\User\UserSize\SetUserSize;


use App\Infrastructure\Domain\Model\Repository\UserSizesRepository;

class SetUserSize
{
    private $repository;


    public function __construct(UserSizesRepository $userSizesRepository)
    {
        $this->repository = $userSizesRepository;

    }

    public function handle(SetUserSizeCommand $command)
    {
        $userSize = $this->repository->getUserSize($command->userSizeId());

        $userSize->setUserSize($command->userSize());

        $this->repository->updateUserSize();

        return 'ok';
    }

}
