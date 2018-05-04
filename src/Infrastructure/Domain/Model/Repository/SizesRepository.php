<?php

namespace App\Infrastructure\Domain\Model\Repository;

use App\Domain\Model\Entity\Sizes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Sizes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sizes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sizes[]    findAll()
 * @method Sizes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SizesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Sizes::class);
    }

//    /**
//     * @return Sizes[] Returns an array of Sizes objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Sizes
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
