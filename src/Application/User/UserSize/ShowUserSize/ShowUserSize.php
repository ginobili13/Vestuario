<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 26/04/18
 * Time: 14:20
 */

namespace App\Application\User\UserSize\ShowUserSize;

use App\Domain\Model\Entity\User\UserSize\UserSizesRepository;

class ShowUserSize
{
    private $repository;
    private $transform;

    public function __construct(UserSizesRepository $userSizesRepository, ShowUserSizeDataTransform $showUserSizeTransform)
    {
        $this->repository = $userSizesRepository;
        $this->transform = $showUserSizeTransform;
    }


    public function execute(ShowUserSizeCommand $command): array
    {
        $userSize = $this->repository->findUserSizeOrNull($command->getIdUser());

        return $this->transform->transform($userSize);
    }
}
