<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 30/05/18
 * Time: 8:37
 */

namespace App\Domain\Model\Entity\Department;


interface DepartmentsRepository
{
    public function getDepartmentId($id): ? Departments;
}