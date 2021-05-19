<?php

namespace App\Repository;

use App\Entity\Envenement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Envenement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Envenement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Envenement[]    findAll()
 * @method Envenement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnvenementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Envenement::class);
    }

    // /**
    //  * @return Envenement[] Returns an array of Envenement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Envenement
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
