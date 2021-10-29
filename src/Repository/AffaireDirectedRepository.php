<?php

namespace App\Repository;

use App\Entity\AffaireDirected;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AffaireDirected|null find($id, $lockMode = null, $lockVersion = null)
 * @method AffaireDirected|null findOneBy(array $criteria, array $orderBy = null)
 * @method AffaireDirected[]    findAll()
 * @method AffaireDirected[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AffaireDirectedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AffaireDirected::class);
    }

    // /**
    //  * @return AffaireDirected[] Returns an array of AffaireDirected objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AffaireDirected
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
