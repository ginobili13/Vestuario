<?php

namespace App\Infrastructure\Domain\Model\Repository\Clothe;

use App\Domain\Model\Entity\Clothe\Clothes;
use App\Domain\Model\Entity\Clothe\ClothesRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Clothes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Clothes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Clothes[]    findAll()
 * @method Clothes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClothesDoctrineRepository extends ServiceEntityRepository implements ClothesRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Clothes::class);
    }

    public function findOneOrNull()
    {

    }
}

