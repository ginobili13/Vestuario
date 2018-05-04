<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 14:24
 */

namespace App\Application\User\UserDelivery\CreateUserDelivery;


use App\Domain\Model\Entity\UserDeliveries;
use App\Infrastructure\Domain\Model\Repository\UserDeliveriesRepository;

class CreateUserDelivery
{
    private $repository;
    public function __construct(UserDeliveriesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(CreateUserDeliveryCommand $deliveryCommand)
    {
        $userDelivery = new UserDeliveries(
            $deliveryCommand->getDateDelivery(),
            $deliveryCommand->getClotheId(),
            $deliveryCommand->getQuantity(),
            $deliveryCommand->getIdUser()
        );

        $this->repository->createUserDelivery($userDelivery);

        return 'ok';

    }
}