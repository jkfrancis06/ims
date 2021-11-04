<?php

namespace App\Repository;

use App\Entity\Vehicule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Vehicule|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vehicule|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vehicule[]    findAll()
 * @method Vehicule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehiculeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vehicule::class);
    }

    // /**
    //  * @return Vehicule[] Returns an array of Vehicule objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
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

        // categorie
        $categorie = strtolower($data['categorie']);

        if ($categorie != null){
            $qb->andWhere("LOWER(e.categorie) LIKE '%$categorie%'");
        }

        // immatriculation
        $immatriculation = strtolower($data['immatriculation']);

        if ($immatriculation != null){
            $qb->andWhere("LOWER(e.immatriculation) LIKE '%$immatriculation%'");
        }


        return $qb->getQuery()->getResult();


    }
}
