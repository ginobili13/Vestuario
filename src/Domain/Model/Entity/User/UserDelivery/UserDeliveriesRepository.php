<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 30/05/18
 * Time: 8:57
 */

namespace App\Domain\Model\Entity\User\UserDelivery;


use App\Domain\Model\Entity\Clothe\Clothes;
use App\Domain\Model\Entity\User\Users;

interface UserDeliveriesRepository
{
    public function findUserDeliveryOrNull($id): ? array;
    public function findUserOrNull($id): ? Users;
    public function findClotheOrNull($id): ? Clothes;
    public function createUserDelivery(UserDeliveries $userDeliveries): ? UserDeliveries;
    public function DeleteUserDelivery($idUserDelivery): void;
}