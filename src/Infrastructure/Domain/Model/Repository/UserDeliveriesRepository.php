<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 25/04/18
 * Time: 8:48
 */

namespace App\Infrastructure\Domain\Model\Repository;

use App\Domain\Model\Entity\UserDeliveries;
use App\Domain\Model\Entity\Users;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
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

    public function getUser($id)
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();

        try {
            $result = $queryBuilder
                ->select('u')
                ->from('App:Users', 'u')
                ->andWhere('u.id = :id')
                ->setParameter('id', $id)
                ->getQuery()
                ->getOneOrNullResult();
        } catch (NonUniqueResultException $e) {
        }
        return $result;
    }

    public function getClothe($id)
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();

        try {
            $result = $queryBuilder
                ->select('c')
                ->from('App:Clothes', 'c')
                ->andWhere('c.id = :id')
                ->setParameter('id', $id)
                ->getQuery()
                ->getOneOrNullResult();
        } catch (NonUniqueResultException $e) {
        }
        return $result;
    }

    public function createUserDelivery(UserDeliveries $userDeliveries)
    {
        try {
            $this->getEntityManager()->persist($userDeliveries);
        } catch (ORMException $e) {
        }
        try {
            $this->getEntityManager()->flush();
        } catch (OptimisticLockException $e) {
        } catch (ORMException $e) {
        }

        return $userDeliveries;
    }

    public function DeleteUserDelivery($idUserDelivery)
    {
        $userDelivery = $this->find($idUserDelivery);

        try {
            $this->getEntityManager()->remove($userDelivery);
        } catch (ORMException $e) {
        }

        $this->getEntityManager()->flush();
    }
}