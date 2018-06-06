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
    private $userId;
    private $clotheId;


    /**
     * SetUserSizeCommand constructor.
     * @param $userId
     * @param $userSize
     * @param $clotheId
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($userId, $userSize, $clotheId)
    {
        $this->userSize = $userSize;

        Assertion::notBlank($userId,'Debe introducir un valor');
        Assertion::integer($userId, 'El valor introducido no es un número');
        $this->userId = $userId;

        Assertion::notBlank($clotheId,'Debe introducir un valor');
        Assertion::integer($clotheId, 'El valor introducido no es un número');
        $this->clotheId = $clotheId;
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
    public function userId()
    {
        return $this->userId;
    }

    /**
     * @return mixed
     */
    public function clotheId()
    {
        return $this->clotheId;
    }
}



