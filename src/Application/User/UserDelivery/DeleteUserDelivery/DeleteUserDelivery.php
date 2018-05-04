<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 10:33
 */

namespace App\Application\User\UserDelivery\DeleteUserDelivery;


use App\Infrastructure\Domain\Model\Repository\UserDeliveriesRepository;

class DeleteUserDelivery
{
    private $repository;

    public function __construct(UserDeliveriesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(DeleteUserDeliveryCommand $command)
    {
        $idUserDelivery = $command->getDeliveryId();


        $this->repository->DeleteUserDelivery($idUserDelivery);

        return 'ok';

    }
}
