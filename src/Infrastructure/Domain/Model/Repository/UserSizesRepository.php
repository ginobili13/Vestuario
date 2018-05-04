<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 25/04/18
 * Time: 8:48
 */

namespace App\Infrastructure\Domain\Model\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Domain\Model\Entity\UserSizes;

/**
 * @method UserSizes|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserSizes|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserSizes[]    findAll()
 * @method UserSizes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserSizesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent:: __construct($registry, UserSizes::class);
    }

    public function getUserSize($id)
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();

        $result = $queryBuilder
            ->select('us', 'clothe')
            ->from('App:UserSizes', 'us')
            ->innerJoin('us.clothe','clothe')
            ->andWhere('us.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult()
        ;
        return $result;
    }

}