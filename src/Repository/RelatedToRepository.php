<?php

namespace App\Repository;

use App\Entity\RelatedTo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RelatedTo|null find($id, $lockMode = null, $lockVersion = null)
 * @method RelatedTo|null findOneBy(array $criteria, array $orderBy = null)
 * @method RelatedTo[]    findAll()
 * @method RelatedTo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RelatedToRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RelatedTo::class);
    }

    // /**
    //  * @return RelatedTo[] Returns an array of RelatedTo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RelatedTo
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
