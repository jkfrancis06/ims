<?php

namespace App\Repository;

use App\Entity\IntelPartner;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method IntelPartner|null find($id, $lockMode = null, $lockVersion = null)
 * @method IntelPartner|null findOneBy(array $criteria, array $orderBy = null)
 * @method IntelPartner[]    findAll()
 * @method IntelPartner[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IntelPartnerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IntelPartner::class);
    }

    // /**
    //  * @return IntelPartner[] Returns an array of IntelPartner objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?IntelPartner
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
