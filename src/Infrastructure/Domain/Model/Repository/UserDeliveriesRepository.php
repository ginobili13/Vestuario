<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 25/04/18
 * Time: 8:48
 */

namespace App\Infrastructure\Domain\Model\Repository;

use App\Domain\Model\Entity\UserDeliveries;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;


/**
 * @method UserDeliveries|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserDeliveries|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserDeliveries[]    findAll()
 * @method UserDeliveries[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserDeliveriesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserDeliveries::class);
    }

    public function getUserDelivery($id)
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();

        $result = $queryBuilder
            ->select('ud')
            ->from('App:UserDeliveries', 'ud')
            ->innerJoin('ud.user','user')
            ->innerJoin('ud.clothe', 'clothe')
            ->andWhere('ud.user = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult()
        ;
        return $result;
    }

    public function createUserDelivery(UserDeliveries $userDeliveries)
    {
        $this->getEntityManager()->persist($userDeliveries);
        $this->getEntityManager()->flush();

        return $userDeliveries;
    }
}