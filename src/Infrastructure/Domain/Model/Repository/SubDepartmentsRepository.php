<?php

namespace App\Infrastructure\Domain\Model\Repository;

use Doctrine\ORM\EntityRepository;

class SubDepartmentsRepository extends EntityRepository
{

    public function getDepartments()
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();

        $result = $queryBuilder
            ->select('sb', 'department')
            ->from('App:SubDepartments', 'sb')
            ->innerJoin('sb.department','department')
            ->getQuery()
            ->getResult()
        ;
        return $result;
    }
}
