<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 25/04/18
 * Time: 8:48
 */

namespace App\Infrastructure\Domain\Model\Repository\User\UserSize;

use App\Domain\Model\Entity\Clothe\Clothes;
use App\Domain\Model\Entity\User\UserSize\UserSizesRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Domain\Model\Entity\User\UserSize\UserSizes;
use Symfony\Bridge\Doctrine\Tests\Fixtures\User;

/**
 * @method UserSizes|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserSizes|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserSizes[]    findAll()
 * @method UserSizes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserSizesDoctrineRepository extends ServiceEntityRepository implements UserSizesRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent:: __construct($registry, UserSizes::class);
    }

    /**
     * @param $id
     * @return int
     */
    public function checkUserSize($idUser, $idClothe): int
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();

        $result = $queryBuilder
            ->select('u')
            ->from('App:User\UserSize\UserSizes', 'u')
            ->innerJoin('u.clothe','clothe')
            ->andWhere('clothe.id = :idClothe')
            ->andWhere('u.userId = :idUser')
            ->setParameter('idUser', $idUser)
            ->setParameter('idClothe', $idClothe)
            ->getQuery()
            ->getResult();

        if(empty($result)) {
            return 0;
        }
        return 1;
    }

    /**
     * @param $id
     * @return Clothes|null
     * @throws \Doctrine\ORM\NonUniqueResultException
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
            ->getOneOrNullResult();

        if(null === $result) {
            throw new \Exception('La prenda no existe');
        }
        return $result;
    }

    /**
     * @param $idUser
     * @param $idClothe
     * @return UserSizes|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findUserSizeOrNull($idUser, $idClothe): ? UserSizes
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();

        $result = $queryBuilder
            ->select('us', 'clothe')
            ->from('App:User\UserSize\UserSizes', 'us')
            ->innerJoin('us.clothe','clothe')
            ->andWhere('us.userId = :idUser')
            ->andWhere('clothe.id = :idClothe')
            ->setParameter('idUser', $idUser)
            ->setParameter('idClothe', $idClothe)
            ->getQuery()
            ->getOneOrNullResult();

        return $result;
    }

    /**
     * @param $idUser
     * @return array
     */
    public function findUserSizeByUserOrNull($id): array
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();

        $result = $queryBuilder
            ->select('us')
            ->from('App:User\UserSize\UserSizes', 'us')
            ->andWhere('us.userId = :idUser')
            ->setParameter('idUser', $id)
            ->getQuery()
            ->getResult();

        return $result;
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function updateUserSize(): void
    {
        $this->getEntityManager()->flush();
    }

    /**
     * @param UserSizes $userSizes
     * @return UserSizes|null
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Exception
     */
    public function createUserSize(UserSizes $userSizes): ? UserSizes
    {
        if(null === $userSizes) {
            throw new \Exception('No hay tallas de usuario');
        }
        $this->getEntityManager()->persist($userSizes);

        $this->getEntityManager()->flush();

        return $userSizes;
    }

    public function findAllClothes()
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();

        $result = $queryBuilder
            ->select('cl')
            ->from('App:Clothe\Clothes', 'cl')
            ->getQuery()
            ->getResult();

        return $result;
    }
}

