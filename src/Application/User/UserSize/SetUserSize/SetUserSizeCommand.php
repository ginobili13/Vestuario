<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 11:18
 */

namespace App\Application\User\UserSize\SetUserSize;


use Assert\Assertion;

class SetUserSizeCommand
{
    private $userSize;
    private $userSizeId;

    public function __construct($userSizeId, $userSize)
    {
        Assertion::notBlank($userSize,'Debe introducir un valor');
        $this->userSize = $userSize;

        Assertion::notBlank($userSizeId,'Debe introducir un valor');
        Assertion::integer($userSizeId, 'El valor introducido no es un número');
        $this->userSizeId = $userSizeId;
    }

    /**
     * @return mixed
     */
    public function userSize()
    {
        return $this->userSize;
    }

    /**
     * @return mixed
     */
    public function userSizeId()
    {
        return $this->userSizeId;
    }
}
