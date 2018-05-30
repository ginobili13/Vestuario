<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 14:24
 */

namespace App\Application\User\UserDelivery\CreateUserDelivery;


use App\Domain\Model\Entity\User\UserDelivery\UserDeliveriesRepository;
use App\Domain\Model\Entity\User\UserDelivery\UserDeliveries;

class CreateUserDelivery
{
    private $repository;

    public function __construct(UserDeliveriesRepository $repository)
    {
        $this->repository = $repository;
    }


    public function handle(CreateUserDeliveryCommand $deliveryCommand): void
    {
        $userDelivery = new UserDeliveries();

        $idUser = $deliveryCommand->getIdUser();
        $idClothe = $deliveryCommand->getClotheId();

        $userDelivery->setDateDelivery($deliveryCommand->getDateDelivery());
        $userDelivery->setQuantity($deliveryCommand->getQuantity());
        $userDelivery->setUser($this->repository->findUserOrNull($idUser));
        $userDelivery->setClothe($this->repository->findClotheOrNull($idClothe));


        $this->repository->createUserDelivery($userDelivery);

    }
}
