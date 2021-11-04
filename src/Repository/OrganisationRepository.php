<?php

namespace App\Repository;

use App\Entity\Organisation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Organisation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Organisation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Organisation[]    findAll()
 * @method Organisation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrganisationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Organisation::class);
    }

    // /**
    //  * @return Organisation[] Returns an array of Organisation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    public function searchEntite($data)
    {
        $qb =  $this->createQueryBuilder('e');

        // nom
        $nom = strtolower($data['description']);



        if ($nom != null){
            $qb->andWhere("LOWER(e.description)  LIKE '%$nom%'");
        }

        // prenom
        $prenom = strtolower($data['description2']);

        if ($prenom != null){
            $qb->andWhere("LOWER(e.description2) LIKE '%$prenom%'");
        }


        return $qb->getQuery()->getResult();


    }


}
