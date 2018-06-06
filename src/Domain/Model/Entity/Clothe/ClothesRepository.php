<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 30/05/18
 * Time: 8:32
 */

namespace App\Domain\Model\Entity\Clothe;


interface ClothesRepository
{
    public function findAllOrNull(): ? array;
}