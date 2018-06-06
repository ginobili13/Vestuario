<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 30/05/18
 * Time: 9:38
 */

namespace App\Domain\Model\Entity\User\UserSize;


use App\Domain\Model\Entity\Clothe\Clothes;

interface UserSizesRepository
{
    public function checkUserSize($idUser, $idClothe): int;
    public function findClotheOrNull($id): ? Clothes;
    public function findUserSizeOrNull($idUser, $idClothe): ? UserSizes;
    public function findUserSizeByUserOrNull($idUser): array;
    public function updateUserSize(): void;
    public function createUserSize(UserSizes $userSizes): ? UserSizes;
    public function findAllClothes();
}