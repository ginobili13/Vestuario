<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 26/04/18
 * Time: 12:22
 */

namespace App\Application\User\UserSearch\ShowUserBySubDepartments;

use Assert\Assertion;

class ShowUserBySubDepartmentsCommand
{
    private $idSubDepartment;

    /**
     * ShowUserBySubDepartmentsCommand constructor.
     * @param $idSubDepartment
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($idSubDepartment)
    {
        $this->idSubDepartment = $idSubDepartment;

        Assertion::notBlank($idSubDepartment, 'Tienes que especificar un numero de departamento');
        Assertion::numeric($idSubDepartment, 'El valor introducido no es un número');

    }

    /**
     * @return mixed
     */
    public function getIdSubDepartment()
    {
        return $this->idSubDepartment;
    }
}
