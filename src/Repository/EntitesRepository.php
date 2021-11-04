<?php

namespace App\Repository;

use App\Entity\Entites;
use App\Form\Search\EntitySearchType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Entites|null find($id, $lockMode = null, $lockVersion = null)
 * @method Entites|null findOneBy(array $criteria, array $orderBy = null)
 * @method Entites[]    findAll()
 * @method Entites[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntitesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Entites::class);
    }

    // /**
    //  * @return Entites[] Returns an array of Entites objects
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
