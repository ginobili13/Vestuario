<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 10:29
 */

namespace App\Application\User\UserDelivery\DeleteUserDelivery;


use Assert\Assertion;

class DeleteUserDeliveryCommand
{
    private $delivery_id;

    public function __construct($deliveryId)
    {
        Assertion::notBlank($deliveryId,'Debe introducir un valor');
        Assertion::integer($deliveryId,'El valor introducido no es un número');

        $this->delivery_id = $deliveryId;

    }

    /**
     * @return mixed
     */
    public function getDeliveryId()
    {
        return $this->delivery_id;
    }


}
