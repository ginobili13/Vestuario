<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 26/04/18
 * Time: 12:12
 */

namespace App\Application\User\UserSearch\ShowUserByDepartment;

use Assert\Assertion;

class ShowUserByDepartmentCommand
{
    private $idDepartment;

    /**
     * ShowUserByDepartmentCommand constructor.
     * @param $idDepartment
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($idDepartment)
    {
        Assertion::notBlank($idDepartment, 'Tienes que especificar un numero de departamento');
        Assertion::numeric($idDepartment, 'El valor no es un número');

        $this->idDepartment = $idDepartment;

    }

    /**
     * @return mixed
     */
    public function getIdDepartment()
    {
        return $this->idDepartment;
    }


}