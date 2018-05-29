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
    private $userDelivery;

    public function __construct(UserDeliveriesRepository $repository, UserDeliveries $userDeliveries)
    {
        $this->repository = $repository;
        $this->userDelivery = $userDeliveries;
    }

    /**
     * @param CreateUserDeliveryCommand $deliveryCommand
     * @return string
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function handle(CreateUserDeliveryCommand $deliveryCommand)
    {
        $idUser = $deliveryCommand->getIdUser();
        $idClothe = $deliveryCommand->getClotheId();

        $this->userDelivery->setDateDelivery($deliveryCommand->getDateDelivery());
        $this->userDelivery->setQuantity($deliveryCommand->getQuantity());
        $this->userDelivery->setUser($this->repository->getUser($idUser));
        $this->userDelivery->setClothe($this->repository->getClothe($idClothe));


        $this->repository->createUserDelivery($this->userDelivery);

        return 'ok';

    }
}