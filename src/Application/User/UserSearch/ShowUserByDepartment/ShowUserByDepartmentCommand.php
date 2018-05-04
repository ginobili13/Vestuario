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
    private $id_department;

    public function __construct($id_department)
    {
        $this->id_department = $id_department;

//       Assertion::notBlank($id_department, 'Tienes que especificar un numero de departamento');
//       Assertion::numeric($id_department, 'El valor no es un número');
    }

    /**
     * @return mixed
     */
    public function getIdDepartment()
    {
        return $this->id_department;
    }


}