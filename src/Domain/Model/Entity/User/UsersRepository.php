<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 30/05/18
 * Time: 9:22
 */

namespace App\Domain\Model\Entity\User;


interface UsersRepository
{
    public function findUserByEmployeeCodeOrNull($code): ? array;
    public function findUserByDepartmentOrNull($id): ? array;
    public function findUsersBySubDepartmentsOrNull($id): ? array;
    public function findUserByNameOrNull($id): ? array;
    public function findAllByLimitOrNull($limit, $page): ? array;
}