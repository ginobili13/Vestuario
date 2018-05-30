<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 25/04/18
 * Time: 8:48
 */

namespace App\Infrastructure\Domain\Model\Repository\UserSize;

use App\Domain\Model\Entity\User\UserSize\UserSizesRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Domain\Model\Entity\User\UserSize\UserSizes;

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
     * @return array
     * @throws \Exception
     */
    public function findUserSizeOrNull($id): ? array
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();

        $result = $queryBuilder
            ->select('us', 'clothe')
            ->from('App:User\Size\UserSizes', 'us')
            ->innerJoin('us.clothe','clothe')
            ->andWhere('us.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();

        if(null === $result) {
            throw new \Exception('No existe talla de usuario');
        }
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
}

