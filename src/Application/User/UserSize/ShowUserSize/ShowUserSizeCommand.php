<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 26/04/18
 * Time: 14:20
 */

namespace App\Application\User\UserSize\ShowUserSize;


use Assert\Assertion;

class ShowUserSizeCommand
{
    private $idUser;

    /**
     * ShowUserSizeCommand constructor.
     * @param $idUser
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($idUser)
    {
        $this->idUser = $idUser;

        Assertion::notBlank($idUser, 'Tienes que especificar un id de usuario');
        Assertion::numeric($idUser, 'El id del usuario no es un número');
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}
