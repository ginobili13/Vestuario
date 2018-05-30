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
    private $idUser;
    private $quantity;
    private $dateDelivery;
    private $clotheId;

    /**
     * CreateUserDeliveryCommand constructor.
     * @param $dateDelivery
     * @param $clotheId
     * @param $quantity
     * @param $userId
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($dateDelivery,$clotheId,$quantity,$userId)
    {
        Assertion::notBlank($userId,'Debe introducir un valor');
        Assertion::integer($userId,'El valor introducido no es un número');
        $this->idUser = $userId;

        Assertion::notBlank($quantity,'Debe introducir un valor');
        Assertion::integer($quantity,'El valor introducido no es un número');
        $this->quantity = $quantity;

        Assertion::notBlank($dateDelivery,'Debe introducir un valor');
        //Assertion::date($date_delivery, 'Y-m-d','Introduce una fecha valida');
        $this->dateDelivery = $dateDelivery;

        Assertion::notBlank($clotheId,'Debe introducir un valor');
        Assertion::integer($clotheId,'El valor introducido no es un número');
        $this->clotheId = $clotheId;
    }

    /**
     * @return mixed
     */
    public function getIdUser(): int
    {
        return $this->idUser;
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
        return $this->dateDelivery;
    }

    /**
     * @return mixed
     */
    public function getClotheId()
    {
        return $this->clotheId;
    }
}
