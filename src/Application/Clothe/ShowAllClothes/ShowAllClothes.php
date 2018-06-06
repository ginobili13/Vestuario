<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 9:27
 */

namespace App\Application\Clothe\ShowAllClothes;



use App\Domain\Model\Entity\Clothe\ClothesRepository;

class ShowAllClothes
{
    private $repository;
    private $transform;

    public function __construct(ClothesRepository $clothesRepository, ShowAllClothesDataTransform $transform)
    {
        $this->repository = $clothesRepository;
        $this->transform = $transform;
    }

    public function execute()
    {
        $allClothes = $this->repository->findAllOrNull();

        return $this->transform->transform($allClothes);
    }
}

