<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 10:14
 */

namespace App\Application\User\UserDelivery\ShowUserDelivery;


use App\Domain\Model\Entity\UserDeliveries;

class ShowUserDeliveryDataTransform
{
    /**
     * @param array|UserDeliveries[] $userDeliveries
     * @return array
     */
    public function transform(array $userDeliveries)
    {
        $userTransform = [];

        foreach ($userDeliveries as $userDelivery) {

            $userTransform []= [
                'date_delivery' => $userDelivery->getDateDelivery(),
                'clothe' => $userDelivery->getClothe()->getName(),
                'quantity' => $userDelivery->getQuantity()
            ];
        }
        return json_encode($userTransform);
    }
}
