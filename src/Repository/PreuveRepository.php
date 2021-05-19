<?php

namespace App\Repository;

use App\Entity\Preuve;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Preuve|null find($id, $lockMode = null, $lockVersion = null)
 * @method Preuve|null findOneBy(array $criteria, array $orderBy = null)
 * @method Preuve[]    findAll()
 * @method Preuve[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PreuveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Preuve::class);
    }

    // /**
    //  * @return Preuve[] Returns an array of Preuve objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Preuve
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
