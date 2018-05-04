<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 26/04/18
 * Time: 10:08
 */

namespace App\Application\User\UserSearch\ShowUserByEmployeeCode;

use Assert\Assertion;

class ShowUserByEmployeeCodeCommand
{
    private $employee_code;

    /**
     * ShowUserByEmployeeCodeCommand constructor.
     * @param $employee_code
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($employee_code)
    {
        $this->employee_code = $employee_code;

        Assertion::notBlank($employee_code, 'Tienes que especificar un numero de empleado');
        Assertion::numeric($employee_code, 'El numero de empleado, no es un número');
    }

    /**
     * @return mixed
     */
    public function getEmployeeCode()
    {
        return $this->employee_code;
    }


}