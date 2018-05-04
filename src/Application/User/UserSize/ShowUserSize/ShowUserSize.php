<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 26/04/18
 * Time: 14:20
 */

namespace App\Application\User\UserSize\ShowUserSize;

use App\Infrastructure\Domain\Model\Repository\UserSizesRepository;

class ShowUserSize
{
    private $repository;
    private $transform;

    public function __construct(UserSizesRepository $userSizesRepository, ShowUserSizeDataTransform $showUserSizeTransform)
    {
        $this->repository = $userSizesRepository;
        $this->transform = $showUserSizeTransform;
    }

    public function execute(ShowUserSizeCommand $command)
    {
        $userSize = $this->repository->getUserSize($command->getIdUser());

        return $this->transform->transform($userSize);
    }
}