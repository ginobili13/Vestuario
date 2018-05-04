<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 10:13
 */

namespace App\Application\User\UserDelivery\ShowUserDelivery;


use App\Infrastructure\Domain\Model\Repository\UserDeliveriesRepository;


class ShowUserDelivery
{
    private $transform;
    private $repository;

    public function __construct(ShowUserDeliveryDataTransform $dataTransform, UserDeliveriesRepository $repository)
    {
        $this->transform = $dataTransform;
        $this->repository = $repository;
    }

    public function execute(ShowUserDeliveryCommand $command)
    {
        $userDelivery = $this->repository->getUserDelivery($command->getIdUser());

        return $this->transform->transform($userDelivery);
    }

}