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
    private $id_subDepartment;

    /**
     * ShowUserBySubDepartmentsCommand constructor.
     * @param $id_subDepartment
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($id_subDepartment)
    {
        $this->id_subDepartment = $id_subDepartment;

        Assertion::notBlank($id_subDepartment, 'Tienes que especificar un numero de departamento');
        Assertion::numeric($id_subDepartment, 'El valor introducido no es un número');

    }

    /**
     * @return mixed
     */
    public function getIdSubDepartment()
    {
        return $this->id_subDepartment;
    }


}