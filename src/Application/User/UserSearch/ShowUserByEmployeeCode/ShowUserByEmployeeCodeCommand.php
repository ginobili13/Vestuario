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
    private $employeeCode;

    /**
     * ShowUserByEmployeeCodeCommand constructor.
     * @param $employeeCode
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($employeeCode)
    {
        $this->employeeCode = $employeeCode;

        Assertion::notBlank($employeeCode, 'Tienes que especificar un numero de empleado');
        Assertion::numeric($employeeCode, 'El numero de empleado, no es un número');
    }

    /**
     * @return mixed
     */
    public function getEmployeeCode()
    {
        return $this->employeeCode;
    }
}
