<?php

namespace App\Infrastructure\Domain\Model\Repository\Size;

use App\Domain\Model\Entity\Size\Sizes;
use App\Domain\Model\Entity\Size\SizesRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Sizes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sizes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sizes[]    findAll()
 * @method Sizes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SizesDoctrineRepository extends ServiceEntityRepository implements SizesRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Sizes::class);
    }
}

