<?php

namespace App\Infrastructure\Domain\Model\Repository\User;

use App\Domain\Model\Entity\User\Users;
use App\Domain\Model\Entity\User\UsersRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Users|null find($id, $lockMode = null, $lockVersion = null)
 * @method Users|null findOneBy(array $criteria, array $orderBy = null)
 * @method Users[]    findAll()
 * @method Users[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersDoctrineRepository extends ServiceEntityRepository implements UsersRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Users::class);
    }

    /**
     * @param $code
     * @return Users|null
     * @throws \Exception
     */
    public function findUserByEmployeeCodeOrNull($code): ? array
    {
        $result = $this->createQueryBuilder('user')
            ->andWhere('user.employeeCode = :employeeCode')
            ->setParameter('employeeCode', $code)
            ->getQuery()
            ->getResult();

        if(null === $result) {
            throw new \Exception('No existe el usuario');
        }
        return $result;
    }

    /**
     * @param $id
     * @return array|null
     * @throws \Exception
     */
    public function findUserByDepartmentOrNull($id): ? array
    {
        $result = $this->createQueryBuilder('user')
            ->andWhere('user.department = :department')
            ->setParameter('department', $id)
            ->orderBy('user.name', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();

        if(null === $result) {
            throw new \Exception('No exsite el usuario');
        }
        return $result;
    }

    /**
     * @param $id
     * @return array|null
     * @throws \Exception
     */
    public function findUsersBySubDepartmentsOrNull($id): ? array
    {
        $result = $this->createQueryBuilder('user')
            ->andWhere('user.subDepartment = :subDepartment')
            ->setParameter('subDepartment', $id)
            ->orderBy('user.name', 'ASC')
            ->getQuery()
            ->getResult();

        if(null === $result) {
            throw new \Exception('No existe el usuario');
        }
        return $result;
    }

    /**
     * @param $id
     * @return array|null
     * @throws \Exception
     */
    public function findUserByNameOrNull($id): ? array
    {
        $result = $this->createQueryBuilder('user')
            ->andWhere('user.name = :name')
            ->setParameter('name', $id)
            ->orderBy('user.name', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();

        if(null === $result) {
            throw new \Exception('No existe el usuario');
        }

        return $result;
    }

    /**
     * @param $limit
     * @param $page
     * @return array|null
     * @throws \Exception
     */
    public function findAllByLimitOrNull($limit, $page): ? array
    {
        $result = $this->createQueryBuilder('user')
            ->setFirstResult($limit * ($page - 1))
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();

        if(null === $result) {
            throw new \Exception('No existe el usuario');
        }
        return $result;
    }
}

