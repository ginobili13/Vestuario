<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 25/04/18
 * Time: 8:48
 */

namespace App\Infrastructure\Domain\Model\Repository\User\UserDelivery;

use App\Domain\Model\Entity\Clothe\Clothes;
use App\Domain\Model\Entity\User\UserDelivery\UserDeliveries;
use App\Domain\Model\Entity\User\UserDelivery\UserDeliveriesRepository;
use App\Domain\Model\Entity\User\Users;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;



/**
 * @method UserDeliveries|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserDeliveries|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserDeliveries[]    findAll()
 * @method UserDeliveries[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserDeliveriesDoctrineRepository extends ServiceEntityRepository implements UserDeliveriesRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserDeliveries::class);
    }

    /**
     * @param $id
     * @return UserDeliveries|null
     * @throws \Exception
     */
    public function findUserDeliveryOrNull($id): ? array
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();

        $result = $queryBuilder
            ->select('ud')
            ->from('App:User\UserDelivery\UserDeliveries', 'ud')
            ->innerJoin('ud.user','user')
            ->innerJoin('ud.clothe', 'clothe')
            ->andWhere('ud.user = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();

        if(null === $result) {
            throw new \Exception('El usuario no existe');
        }
        return $result;
    }

    /**
     * @param $id
     * @return Users|null
     * @throws \Exception
     */
    public function findUserOrNull($id): ? Users
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();

            $result = $queryBuilder
                ->select('u')
                ->from('App:User\Users', 'u')
                ->andWhere('u.id = :id')
                ->setParameter('id', $id)
                ->getQuery()
                ->getResult();

        if(null === $result) {
            throw new \Exception('El usuario no existe');
        }
        return $result;
    }

    /**
     * @param $id
     * @return Clothes|null
     * @throws \Exception
     */
    public function findClotheOrNull($id): ? Clothes
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();

            $result = $queryBuilder
                ->select('c')
                ->from('App:Clothe\Clothes', 'c')
                ->andWhere('c.id = :id')
                ->setParameter('id', $id)
                ->getQuery()
                ->getResult();

        if(null === $result) {
            throw new \Exception('La prenda no existe');
        }
        return $result;
    }

    /**
     * @param UserDeliveries $userDeliveries
     * @return UserDeliveries|null
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Exception
     */
    public function createUserDelivery(UserDeliveries $userDeliveries): ? UserDeliveries
    {

        if(null === $userDeliveries) {
            throw new \Exception('No hay entrega de vestuario');
        }
            $this->getEntityManager()->persist($userDeliveries);

            $this->getEntityManager()->flush();

        return $userDeliveries;
    }

    /**
     * @param $idUserDelivery
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function DeleteUserDelivery($idUserDelivery): void
    {
        $userDelivery = $this->find($idUserDelivery);

        $this->getEntityManager()->remove($userDelivery);


        $this->getEntityManager()->flush();
    }
}
