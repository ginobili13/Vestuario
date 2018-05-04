<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 14:25
 */

namespace App\Application\User\UserDelivery\CreateUserDelivery;


use Assert\Assertion;

class CreateUserDeliveryCommand
{
    private $id_user;
    private $quantity;
    private $date_delivery;
    private $clothe_id;

    public function __construct($date_delivery,$clothe_id,$quantity,$user_id)
    {
        Assertion::notBlank($user_id,'Debe introducir un valor');
        Assertion::integer($user_id,'El valor introducido no es un número');
        $this->id_user = $user_id;

        Assertion::notBlank($quantity,'Debe introducir un valor');
        Assertion::integer($quantity,'El valor introducido no es un número');
        $this->quantity = $quantity;

        Assertion::notBlank($date_delivery,'Debe introducir un valor');
        //Assertion::date($date_delivery, 'Y-m-d','Introduce una fecha valida');
        $this->date_delivery = $date_delivery;

        Assertion::notBlank($clothe_id,'Debe introducir un valor');
        Assertion::integer($clothe_id,'El valor introducido no es un número');
        $this->clothe_id = $clothe_id;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return mixed
     */
    public function getDateDelivery()
    {
        return $this->date_delivery;
    }

    /**
     * @return mixed
     */
    public function getClotheId()
    {
        return $this->clothe_id;
    }


}