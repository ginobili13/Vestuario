<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 24/04/18
 * Time: 11:36
 */

namespace App\Infrastructure\Domain\Model\Repository;

use App\Domain\Model\Entity\Departments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Departments|null find($id, $lockMode = null, $lockVersion = null)
 * @method Departments|null findOneBy(array $criteria, array $orderBy = null)
 * @method Departments[]    findAll()
 * @method Departments[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DepartmentsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Departments::class);
    }

}