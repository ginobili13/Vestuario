<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 30/05/18
 * Time: 8:39
 */

namespace App\Domain\Model\Entity\Department\SubDepartment;


interface SubDepartmentsRepository
{
    public function findOneOrNull(): ? SubDepartments ;
}