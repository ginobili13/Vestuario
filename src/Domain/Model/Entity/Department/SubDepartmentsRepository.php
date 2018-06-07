<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 30/05/18
 * Time: 8:39
 */

namespace App\Domain\Model\Entity\Department;


interface SubDepartmentsRepository
{
    public function findOneOrNull(): ? SubDepartments ;
    public function getSubDepartmentId($subDepartment): ? SubDepartments;
}