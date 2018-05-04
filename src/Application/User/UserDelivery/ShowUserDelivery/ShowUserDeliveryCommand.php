<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 10:13
 */

namespace App\Application\User\UserDelivery\ShowUserDelivery;


use Assert\Assertion;

class ShowUserDeliveryCommand
{
    private $id_user;

    /**
     * ShowUserDeliveryCommand constructor.
     * @param $id
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($id)
    {
        Assertion::notBlank($id,'Debe introducir un número de ussuario');
        Assertion::integer($id,'El valor introducido no es un número');
        $this->id_user = $id;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

}