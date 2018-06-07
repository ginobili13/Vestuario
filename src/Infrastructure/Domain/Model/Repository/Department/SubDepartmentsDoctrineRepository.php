<?php

namespace App\Infrastructure\Domain\Model\Repository\Department;


use App\Domain\Model\Entity\Department\SubDepartments;
use App\Domain\Model\Entity\Department\SubDepartmentsRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;


class SubDepartmentsDoctrineRepository extends ServiceEntityRepository implements SubDepartmentsRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SubDepartments::class);
    }

    /**
     * @return SubDepartments|null
     * @throws \Exception
     */
    public function findOneOrNull(): ? SubDepartments
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();

        $result = $queryBuilder
            ->select('sb', 'department')
            ->from('App:Department\SubDepartments', 'sb')
            ->innerJoin('sb.department', 'department')
            ->getQuery()
            ->getResult();

        if ($result === null) {
            throw new \Exception('El subdepartamento no existe');
        }

        return $result;
    }

    /**
     * @param $subDepartment
     * @return array
     * @throws \Exception
     */
    public function getSubDepartmentId($subDepartment): ? SubDepartments
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();

        $result = $queryBuilder
            ->select('sub')
            ->from('App:Department\SubDepartments', 'sub')
            ->andWhere('sub.name LIKE :name')
            ->setParameter('name', '%'.$subDepartment.'%')
            ->getQuery()
            ->getOneOrNullResult();

        if ($result === null) {
            throw new \Exception('El subDepartamento no existe');
        }

        return $result;
    }
}

