<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 30/05/18
 * Time: 9:38
 */

namespace App\Domain\Model\Entity\User\UserSize;


interface UserSizesRepository
{
    public function findUserSizeOrNull($id): ? array;
    public function updateUserSize(): void;
}