<?php

namespace App\Repository;

use App\Entity\DepartementDirector;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DepartementDirector|null find($id, $lockMode = null, $lockVersion = null)
 * @method DepartementDirector|null findOneBy(array $criteria, array $orderBy = null)
 * @method DepartementDirector[]    findAll()
 * @method DepartementDirector[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DepartementDirectorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DepartementDirector::class);
    }

    // /**
    //  * @return DepartementDirector[] Returns an array of DepartementDirector objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DepartementDirector
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
