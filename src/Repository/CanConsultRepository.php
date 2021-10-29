<?php

namespace App\Repository;

use App\Entity\CanConsult;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CanConsult|null find($id, $lockMode = null, $lockVersion = null)
 * @method CanConsult|null findOneBy(array $criteria, array $orderBy = null)
 * @method CanConsult[]    findAll()
 * @method CanConsult[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CanConsultRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CanConsult::class);
    }

    // /**
    //  * @return CanConsult[] Returns an array of CanConsult objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CanConsult
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
