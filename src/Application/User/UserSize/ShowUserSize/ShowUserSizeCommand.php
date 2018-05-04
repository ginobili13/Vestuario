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
    private $id_user;

    public function __construct($id_user)
    {
        $this->id_user = $id_user;

        Assertion::notBlank($id_user, 'Tienes que especificar un id de usuario');
        Assertion::numeric($id_user, 'El id del usuario no es un número');
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }
}