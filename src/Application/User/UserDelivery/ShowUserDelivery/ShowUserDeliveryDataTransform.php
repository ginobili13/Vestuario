<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 10:14
 */

namespace App\Application\User\UserDelivery\ShowUserDelivery;


use App\Application\User\DataTransformInterface;
use App\Domain\Model\Entity\User\UserDeliveries;

class ShowUserDeliveryDataTransform implements DataTransformInterface
{
    /**
     * @param array|UserDeliveries[] $userDeliveries
     * @return string
     */
    public function transform(array $userDeliveries)
    {
        $userTransform = [];

        foreach ($userDeliveries as $userDelivery) {

            $userTransform []= [
                'id' => $userDelivery->getId(),
                'date_delivery' => $userDelivery->getDateDelivery(),
                'clothe' => $userDelivery->getClothe()->getName(),
                'quantity' => $userDelivery->getQuantity()
            ];
        }
        return json_encode($userTransform);
    }
}

