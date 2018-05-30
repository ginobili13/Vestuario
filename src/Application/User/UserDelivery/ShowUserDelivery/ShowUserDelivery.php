<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 10:13
 */

namespace App\Application\User\UserDelivery\ShowUserDelivery;


use App\Domain\Model\Entity\User\UserDelivery\UserDeliveriesRepository;

class ShowUserDelivery
{
    private $transform;
    private $repository;

    public function __construct(ShowUserDeliveryDataTransform $dataTransform, UserDeliveriesRepository $repository)
    {
        $this->transform = $dataTransform;
        $this->repository = $repository;
    }

    public function execute(ShowUserDeliveryCommand $command): string
    {
        $userDelivery = $this->repository->findUserDeliveryOrNull($command->getIdUser());

        return $this->transform->transform($userDelivery);
    }
}
