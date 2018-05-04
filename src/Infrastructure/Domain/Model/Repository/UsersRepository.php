<?php

namespace App\Infrastructure\Domain\Model\Repository;

use App\Domain\Model\Entity\Users;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Users|null find($id, $lockMode = null, $lockVersion = null)
 * @method Users|null findOneBy(array $criteria, array $orderBy = null)
 * @method Users[]    findAll()
 * @method Users[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Users::class);
    }

    /**
     * @param $name
     * @return Users[] Returns an array of Users objects

    public function findUserByNameOrSocialSecurity($value): array
    {
        return $this->createQueryBuilder('user')
            ->andWhere('user.name = :name')
            ->orWhere('user.socialSecurity = :socialSecurity')
            ->setParameters(['name' => $value, 'socialSecurity' => $value])
            ->orderBy('user.name', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
            ;
    }
     *
     */

    public function findUserByEmployeeCode($value)
    {
        return $this->createQueryBuilder('user')
            ->andWhere('user.employeeCode = :employeeCode')
            ->setParameter('employeeCode', $value)
            ->getQuery()
            ->getResult();
    }


    public function findUserByDepartment($id): array
    {
        return $this->createQueryBuilder('user')
            ->andWhere('user.department = :department')
            ->setParameter('department', $id)
            ->orderBy('user.name', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
            ;
    }

    public function findUsersBySubDepartments($id)
    {
        return $this->createQueryBuilder('user')
            ->andWhere('user.subDepartment = :subDepartment')
            ->setParameter('subDepartment', $id)
            ->orderBy('user.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findUserByName($id): array
    {
        return $this->createQueryBuilder('user')
            ->andWhere('user.name = :name')
            ->setParameter('name', $id)
            ->orderBy('user.name', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
            ;
    }

    public function findAllByLimit($limit, $page)
    {
        return $this->createQueryBuilder('user')
            ->setFirstResult($limit * ($page - 1))
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /*
    public function findOneBySomeField($value): ?Users
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
